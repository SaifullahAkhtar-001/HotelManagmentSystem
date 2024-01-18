<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImgGalleryController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\NotInteriorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Models\Hotel;
use App\Models\Room;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/room/{id}', [HomeController::class, 'room'])->name('room.show');
Route::get('/{id}/terms&condition', [HomeController::class, 'terms'])->name('terms');

Route::get('facility/create',[FacilityController::class,'facilityCreate'])->name('facility.create');


Route::get('/dashboard', [DashboardController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('hotels', HotelController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('roomtype', RoomtypeController::class);
    Route::resource('facility',FacilityController::class);

    Route::get('hotels/amenity/{id}', [AmenityController::class, 'index'])->name('hotels.amenity');
    Route::get('hotels/amenity/{id}/create', [AmenityController::class, 'create'])->name('hotels.amenity.create');
    Route::post('hotels/amenity/store', [AmenityController::class, 'store'])->name('hotels.amenity.store');
    Route::get('hotels/amenity/update/{id}', [AmenityController::class, 'edit'])->name('hotels.amenity.edit');
    Route::put('hotels/amenity/update/{id}', [AmenityController::class, 'update'])->name('hotels.amenity.update');
    Route::delete('hotels/amenity/{id}', [AmenityController::class, 'destroy'])->name('hotels.amenity.destroy');

    Route::get('hotels/interior/{id}', [InteriorController::class, 'index'])->name('hotels.interior');
    Route::get('hotels/interior/{id}/create', [InteriorController::class, 'create'])->name('hotels.interior.create');
    Route::post('hotels/interior/store', [InteriorController::class, 'store'])->name('hotels.interior.save');

    Route::get('/delete-image-from-gallery/{id}', [ImgGalleryController::class, 'destroy'])->name('image.delete');
    Route::get('website-settings',[WebsiteSettingsController::class, 'index'])->name('website-settings.index');
    Route::post('website-settings',[WebsiteSettingsController::class, 'update'])->name('website-settings.update');

    Route::get('hotels/{id}/terms',[TermController::class, 'index'])->name('hotels.terms');
    Route::post('hotels/terms/store',[TermController::class, 'store'])->name('hotels.terms.store');
    Route::get('hotels/{id}/terms/edit',[TermController::class, 'edit'])->name('hotels.terms.edit');
    Route::put('hotels/{id}/terms/edit',[TermController::class, 'update'])->name('hotels.terms.update');
    Route::delete('hotels/terms/{id}',[TermController::class, 'destroy'])->name('hotels.terms.destroy');

    Route::get('/hotel-settings/{id}', [HotelController::class, 'settings'])->name('hotels.settings');
    Route::post('/hotel-settings', [HotelController::class, 'save_settings'])->name('hotels.save');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
