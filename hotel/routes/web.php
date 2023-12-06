<?php

use App\Http\Controllers\CreatehotelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
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
        'foo' => 'Hello',
    ]);
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/hotelsettings/general', [DashboardController::class, 'showHotelGeneralSettings'])->name('hotelgeneralsettings');
    Route::get('/hotelsettings/interior', [DashboardController::class, 'showHotelInteriorSettings'])->name('hotelinteriorsettings');
    Route::get('/hotelsettings/amenities', [DashboardController::class, 'showHotelAmenitiesSettings'])->name('hotelamenitiessettings');
    Route::get('/createhotel', [CreatehotelController::class, 'showform'])->name('createhotel');

    Route::get('/rooms', [RoomController::class, 'showRooms'])->name('showroom');
});

//Route::get('/dashboard', function () {
//    return view('dashboard.pages.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
