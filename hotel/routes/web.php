<?php

use App\Http\Controllers\CreatehotelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\notHotelController;
use App\Http\Controllers\HotelSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('public.welcome', [
        'hotel' => Hotel::first(),
    ]);
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/hotel-hotel-settings/general', [HotelSettingsController::class, 'general'])->name('hotel-settings.general');
    Route::get('/hotel-hotel-settings/interior', [HotelSettingsController::class, 'interior'])->name('hotel-settings.interior');
    Route::get('/hotel-hotel-settings/amenities', [HotelSettingsController::class, 'amenities'])->name('hotel-settings.amenities');


    Route::resource('hotel', HotelController::class);

    Route::get('/rooms', [RoomController::class, 'showRooms'])->name('showroom');
    // routes/web.php



Route::get('/hotel/settings/general', [HotelSettingsController::class, 'general'])->name('hotel.settings.general');
//Route::put('/hotel/settings/general', [HotelSettingsController::class, 'updateGeneral'])->name('hotel.settings.general.update');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
