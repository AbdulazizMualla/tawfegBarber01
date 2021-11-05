<?php

namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationService
{
    /**
     * Minimum service time
     */
    const MIN_TIME = 30;

    /**
     * Work start time
     */
    private $startTime = '13:00:00';

    /**
     * Work end time
     */
    private $endTime = '00:00:00';

    /**
     * All reservations saved in the database
     */
    protected $reservations;

    /**
     * The type of service chosen by the user
     */
    protected $service;

    /**
     * Number of booking times based on the selected service time and the minimum service time
     * @example If the service time is 120 minutes and the minimum service time is 30 minutes,
     * the $countReservation will be 12/30 = 4, and in the case of reservation, four reservation
     * will be recorded for the user
     */
    protected $countReservation;

    /**
     * Dates and times available for booking
     */
    public $dates = [];

    /**
     * Number of days available for reservation
     */
    protected $numOfDays = 6;



    public function __construct()
    {
        $this->getReservations();
    }

    /**
     * The main function that returns the dates and times available for reservations
     * or returns false if user don't chose service
     */
    public function handle(): array
    {
        abort_if(!$this->setService() , 419);
        $this->setCountReservation();
        $this->availableTimes();
        return $this->dates;
    }

    /**
     * calls the model to fetch the reservations from the database and
     * save them to the variable $this->reservations
     */
    public function getReservations()
    {
        $this->reservations = Reservation::dateUp()->get();
    }

    /**
     * check if user have reservations
     * @return bool
     */
    public function is_user(): bool
    {
        return $this->reservations->where('user_id' , auth()->id())->count();
    }

    /**
     * returns the start time of a work in the format of time
     */
    protected function getStartTime()
    {
        return $this->carbonFormatTime($this->startTime);
    }

    /**
     * returns the end time of a work in the format of time
     * and added a day if the end of work is the next morning
     */
    protected function getEndTime()
    {
        return $this->getStartTime()->gte($this->carbonFormatTime($this->endTime)) ?
            $this->carbonFormatTime($this->endTime)->addDay() :
            $this->carbonFormatTime($this->endTime);
    }

    /**
     * Checks if the user session contains a selected service, saves it to the variable,
     * and returns an false if there is no service in the session
     */
    protected function setService()
    {
        return session()->get('service') ? $this->service = session()->get('service') : false;
    }

    /**
     * divided the service time by the minimum time to determine the number
     * of reservations for this service for each user
     */
    protected function setCountReservation()
    {
        $this->countReservation = intval(ceil($this->getTimeFromService() / static::MIN_TIME));
    }

    /**
     * To return the selected service time
     */
    private function getTimeFromService()
    {
        return $this->service['minute'] > static::MIN_TIME ? $this->service['minute'] : static::MIN_TIME;
    }

    /**
     * The main function is to put the available times in a dates variable
     */
    protected function availableTimes()
    {
        $this->dateAndTime();
        $this->removeTimeNotAvailable();
    }

    /**
     * put the date and times in a dates variable
     */
    protected function dateAndTime()
    {
        for ($i = 0; $i <= $this->numOfDays; $i++) {
            $this->dates [date('Y-m-d', strtotime($i . 'day'))] = $this->times();
        }


    }

    /**
     * remove time before time now
     */
    protected function removeTimeBeforeTimeNow()
    {
        $timeNow = $this->carbonFormatTime(now()->format('H:i:s'));
        foreach ($this->dates[$this->carbonDateNow()] as $time){
            if ($timeNow->gte($this->carbonFormatTime($time))){
                $indexTimeNow = array_search($time , $this->dates[$this->carbonDateNow()]);
                unset($this->dates[$this->carbonDateNow()][$indexTimeNow]);
            }
        }
    }

    protected function carbonDateNow(): string
    {
        return Carbon::now()->format('Y-m-d');
    }

    /**
     * returns the time in the format of time
     */
    protected function carbonFormatTime($time)
    {
        return Carbon::createFromFormat('H:i:s' , $time);
    }

    /**
     * Return all times from the beginning of the work to the end,
     * depending on the minimum service time
     */
    protected function times(): array
    {
        $times = [];
        $time1 = $this->carbonFormatTime($this->startTime);

        array_push($times, $time1->toTimeString());

        while ($time1->between($this->getStartTime(), $this->getEndTime())) {
            $time1 = $time1->addMinutes(static::MIN_TIME);
            if ($time1->between($this->getStartTime(), $this->getEndTime()) && $time1->lt($this->getEndTime()))
                array_push($times, $time1->toTimeString());
        }
        return $times;
    }

    /**
     * Return all times from the beginning of the work to the end,
     * depending on the minimum service time
     */
    protected function removeTimeNotAvailable()
    {
       if ($this->reservations->count() > 0){
           foreach ($this->dates as $key => $date) {
               $this->findInReservations($key, $date);
           }
       }
        $this->cutTimeFromDatesArray();

    }

    /**
     * removes the reserved times from the array of dates
     */
    protected function findInReservations($date, $time)
    {
        foreach ($this->reservations as $reservation) {
            if ($date == $reservation->date) {
                foreach ($time as $index => $tim) {
                    if ($reservation->time == $tim) {
                        unset($this->dates[$date][$index]);
                    }
                }
            }
        }
        sort($this->dates[$date]);
    }

    /**
     * Access the time array for each date and send to method
     * restructures the time array to the service chose and
     * Restructures the time array to the service chose
     */
    protected function cutTimeFromDatesArray()
    {

        foreach ($this->dates as $key => $date) {
            $indexValueDeleted = [];
            foreach ( $date as $index => $time){

                $cutTime = $this->cutValueFromArray($date , $index);
                if (count($cutTime) < $this->countReservation || !$this->checkDifferentTimeBetweenTowTimes($cutTime)){
                    array_push($indexValueDeleted , $index);
                }
            }
            if (count($indexValueDeleted) > 0){
               foreach ($indexValueDeleted as $delete){
                   unset($this->dates[$key][$delete]);
               }
            }
        }
        $this->removeTimeBeforeTimeNow();
    }

    /**
     * cut value from array and saved in array
     * @param array $array The array from which values are to be cropped
     * @param int $start The index to start cropping from
     * @param int $length crop size @optional
     *
     * @return array
     */
    protected function cutValueFromArray(array $array , int $start , int $length = 0) : array
    {
        if ($length === 0) $length = $this->countReservation;
        return array_slice($array , $start , $length);
    }

    protected function checkDifferentTimeBetweenTowTimes(array $array , int $diff = 0) : bool
    {
        if ($diff === 0) $diff = self::MIN_TIME;
        foreach ($array as $key => $value){
            if (array_key_exists($key +1 , $array) &&
                $this->carbonFormatTime($value)->diffInMinutes($this->carbonFormatTime($array[$key+1])) != $diff){
                return false;
            }
        }
        return true;
    }


}
