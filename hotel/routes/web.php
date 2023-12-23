<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\WebsiteSettingsController;
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

Route::get('/', [Controller::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('hotels', HotelController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('facility',FacilityController::class);


    Route::get('website-settings',[WebsiteSettingsController::class, 'index'])->name('website-settings.index');
    Route::post('website-settings',[WebsiteSettingsController::class, 'update'])->name('website-settings.update');

    Route::get('/hotel-settings/{id}', [HotelController::class, 'settings'])->name('hotels.settings');
    Route::post('/hotel-settings', [HotelController::class, 'save_settings'])->name('hotels.save');
    Route::get('/createfacility',[FacilityController::class,'showfacility'])->name('facility.show');
    Route::post('/createfacility',[FacilityController::class,'facilityCreate'])->name('create.facility');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
