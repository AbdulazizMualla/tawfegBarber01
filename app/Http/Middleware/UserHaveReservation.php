<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHaveReservation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user->reservations()->count() > 0 && !session()->has('updateReservation')){

            return redirect()->route('my_reservation');
        }
        return $next($request);
    }
}
