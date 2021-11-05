<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if (!Route::is(['reservation.index' ,'reservation.store'])){
            $this->clearSessionByKey('service');
        }
        if (!Route::is(['chooseService' , 'saveService' , 'reservation.index','reservation.store'])){
            $this->clearSessionByKey('updateReservation');
        }
    }

    private function clearSessionByKey($key)
    {
        $this->middleware(function ($request, $next) use ($key){
            session()->forget($key);
            return $next($request);
        });
    }
}
