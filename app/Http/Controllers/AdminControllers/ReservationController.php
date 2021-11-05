<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Mail\ReservationCancelMail;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user')->where('date' , now()->format('Y-m-d'))->get();
        return view('admin.reservation.index' , compact('reservations'));
    }

    public function allReservation()
    {
        $reservations = Reservation::with('user')->get();
        return view('admin.reservation.all' , compact('reservations'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back();
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->delete();
        Mail::to($reservation->user->email)->send(new ReservationCancelMail());
        return redirect()->back();
    }
}
