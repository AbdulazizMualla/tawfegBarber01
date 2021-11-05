<?php
use App\Http\Controllers\FrontEndControllers\{
    HomeController,
    ReservationController
};
use App\Http\Controllers\AdminControllers\{
    DashboardController,
    UserController,
    ContactController,
    ReservationController as Reservation
};
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/home');
});

Route::get('/home' , [HomeController::class , 'index'])->name('home');
Route::post('/contact' , [HomeController::class , 'contact'])->name('contact');

Route::get('/choose-service' , [ReservationController::class , 'getServices'])->name('chooseService');
Route::post('/save-service' , [ReservationController::class , 'saveService'])->name('saveService');

Route::get('/my-reservation' , [ReservationController::class , 'show'])->name('my_reservation');
Route::post('/edit-reservation' , [ReservationController::class , 'edit'])->name('edit.reservation');
Route::resource('reservation' , ReservationController::class);

Route::group(['prefix' => 'admin' , 'middleware' => ['checkRole', 'auth']] , function (){

    Route::get('/' , [DashboardController::class , 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'reservation'] , function(){

        Route::get('/' , [Reservation::class , 'index'])->name('admin.reservations.index');
        Route::get('/all-reservation' , [Reservation::class , 'allReservation'])->name('admin.reservations.all');
        Route::delete('/{reservation}' , [Reservation::class , 'destroy'])->name('admin.reservations.destroy');
        Route::delete('/cancel/{reservation}' , [Reservation::class , 'cancel'])->name('admin.reservations.cancel');

    });

    Route::group(['prefix' => 'contact'] , function(){

        Route::get('/' , [ContactController::class , 'newMessage'])->name('admin.contacts.index');
        Route::get('/all-message' , [ContactController::class , 'allMessage'])->name('admin.contacts.all');
        Route::get('/{contact}' ,[ContactController::class , 'showMessage'])->name('admin.contacts.show');
        Route::put('/{contact}' ,[ContactController::class , 'update'])->name('admin.contacts.update');
    });

    Route::group(['prefix' => '/users'], function (){

        Route::get('/' , [UserController::class , 'index'])->name('admin.users.index');

        Route::group(['prefix' => 'block'] , function (){
            Route::get('/' , [UserController::class , 'getUsersBlock'])->name('admin.users.block.index');
            Route::delete('/{user}' , [UserController::class , 'destroyBlock'])->name('admin.users.block.destroy');
            Route::post('/' , [UserController::class , 'storeBlock'])->name('admin.users.block.store');
        });

        Route::group(['prefix' => 'active'] ,  function (){
            Route::get('/' , [UserController::class , 'getUsersNotActive'])->name('admin.users.active.index');
            Route::put('/{user}' , [UserController::class , 'activeUser'])->name('admin.users.active.update');
        });

    });
});
