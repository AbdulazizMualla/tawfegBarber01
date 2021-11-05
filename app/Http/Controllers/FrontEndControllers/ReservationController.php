<?php

namespace App\Http\Controllers\FrontEndControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Reservation;
use App\Models\Service;
use App\Services\ReservationService;
use App\Services\ReservationStoreService;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware('haveReservation')->except('show', 'edit' , 'destroy');
        $this->middleware('chooseService')->only('index' , 'store');
    }

    public function index()
    {
        $reservation = new ReservationService();
        $dateAndTime = $reservation->handle();
        return view('front.reserving', compact('dateAndTime'));
    }

    public function getServices()
    {
        $services = Service::all();
        return view('front.chooseService', compact('services'));
    }

    public function saveService(ServiceRequest $request)
    {
        $service = Service::find($request->service);
        if (!$service)
            return redirect()->back()->withErrors('لم تقوم بإختيار نوع الخدمة');
        session(['service' => $service]);
        return redirect()->route('reservation.index');
    }

    public function store(ReservationRequest $request)
    {

         DB::beginTransaction();
        try {
            $reservation = new ReservationStoreService();
            if ($reservation->is_user()){
                auth()->user()->reservations()->delete();
            }
            Reservation::insert($reservation->handle($request->input()));
            DB::commit();
            return redirect()->route('my_reservation');
        }catch (\Error | \Exception $error){
            DB::rollBack();
           return redirect()->back()->withErrors(['error' => 'حدث خطأ أعد المحاولة']);
        }

    }

    public function show()
    {
        $reservation = Reservation::where('user_id' , auth()->id())->first();
        return view('front.my_reserves' , compact('reservation'));
    }

    public function destroy()
    {
        auth()->user()->reservations()->delete();
        return redirect()->route('home');
    }

    public function edit()
    {
        session(['updateReservation' => true]);
        return redirect()->route('chooseService');
    }
}
