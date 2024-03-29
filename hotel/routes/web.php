<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontDeskController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImgGalleryController;
use App\Http\Controllers\InteriorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Models\Hotel;
use App\Models\User;
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
Route::get('/{id}/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');

Route::get('facility/create',[FacilityController::class,'facilityCreate'])->name('facility.create');


Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(callback: function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    Route::resource('hotels', HotelController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('roomtype', RoomtypeController::class);
    Route::resource('facility',FacilityController::class);
    Route::resource('item',ItemController::class);
    Route::resource('frontDesk', FrontDeskController::class);
    Route::resource('guest', GuestController::class);

    Route::get('bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::get('bookings/create/{id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('bookings/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('bookings/show/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::get('bookings/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('bookings/update/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('bookings/destroy/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

    Route::post('/updateQuantity/{id}', [ItemController::class, 'updateQuantity'])->name('updateQuantity');
    Route::get('/search-items', [ItemController::class, 'search'])->name('item.search');


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

    Route::get('test', function(){
        $hotel = Hotel::first();
        $website_settings = $hotel->website_settings;
        return view('public.pages.aboutUs',[
            'hotel' => $hotel,
            'website_settings' => $website_settings,
        ]);
    });

    Route::get('hotels/{id}/terms',[TermController::class, 'index'])->name('hotels.terms');
    Route::post('hotels/terms/store',[TermController::class, 'store'])->name('hotels.terms.store');
    Route::get('hotels/{id}/terms/edit',[TermController::class, 'edit'])->name('hotels.terms.edit');
    Route::put('hotels/{id}/terms/edit',[TermController::class, 'update'])->name('hotels.terms.update');
    Route::delete('hotels/terms/{id}',[TermController::class, 'destroy'])->name('hotels.terms.destroy');

    Route::get('/hotel-settings/{id}', [HotelController::class, 'settings'])->name('hotels.settings');
    Route::post('/hotel-settings', [HotelController::class, 'save_settings'])->name('hotels.save');

    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::post('/users/{user}/roles',[UserController::class,'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole'])->name('users.roles.remove');
    Route::Post('/roles/{role}/permissions',[RoleController::class ,'givepermission'])->name('roles.permission');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])
    ->name('roles.permissions.revoke');
    Route::post('/users/{user}/permissions',[UserController::class,'givePermission'])->name('users.Permissions');
    Route::delete('/users/{user}/permissions/{permission}',[UserController::class,'revokePermission' ])->name('users.permissions.revoke');
     Route::get('/users/{user}/permissions',[UserController::class,'showPermissions'])->name('users.permissions');
     Route::get('/send-ending-booking-notifications', [BookingController::class, 'sendEndingBookingNotifications']);
     Route::resource('/categories', categoryController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
