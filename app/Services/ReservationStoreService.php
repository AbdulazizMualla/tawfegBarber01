<?php

namespace App\Services;

class ReservationStoreService extends ReservationService
{

    /**
     * The times that will be saved in  database for the user
     */
    protected $data = [];


    public function handle(array $array = null): array
    {
        abort_if(!$this->setService(), 419);
        $this->setCountReservation();
        if ($array != null) $this->setDataStore($array);
        if (!$this->checkReservationIsAvailable()) throw new \Error('reservation not available');
        if (!$this->checkTimeAvailableToReservation()) throw new \Error('This is not the time for reservations');
        return $this->data;
    }

    /**
     * Create dates and times for reservations based on the chosen service
     * @param array The time and date selected by the user
     */
    protected function setDataStore(array $data)
    {
        for ($i = 0; $i < $this->countReservation; $i++) {
            $this->data [] = [
                'date' => $data['date'],
                'time' => $i == 0 ? $this->carbonFormatTime($data['time'])->toTimeString() : $this->carbonFormatTime($data['time'])->addMinutes(self::MIN_TIME * $i)->toTimeString(),
                'user_id' => auth()->id(),
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ];
        }
    }


    /**
     * To prevent the user from having an indefinite time for reservations
     * @return bool false if time not found
     */
    protected function checkTimeAvailableToReservation(): bool
    {
        foreach ($this->data as $item) {
            if (!in_array($item['time'], $this->times())) {
                return false;
            }
        }
        return true;
    }

    /**
     * To prevent a user from injecting a time that is reserved
     * @return bool false if time not found
     */
    protected function checkReservationIsAvailable(): bool
    {
        foreach ($this->data as $item) {

            if ($this->reservations->where('date', $item['date'])->where('time', $item['time'])->count() > 0) {
                return false;
            }
        }
        return true;
    }


}
