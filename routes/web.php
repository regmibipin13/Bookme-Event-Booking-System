<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

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

Route::get('/',[FrontendController::class, 'home'])->name('frontend.home');
Route::get('/shows-and-programs',[FrontendController::class, 'showsandprograms'])->name('frontend.showsandprograms');

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/account',[FrontendController::class, 'account'])->name('frontend.account');
    Route::get('/success',[FrontendController::class, 'success'])->name('frontend.success');
    Route::get('/shows-and-programs/{event}',[FrontendController::class, 'showsandprogramsDetail'])->name('frontend.detail_showsandprograms');
    Route::post('/api/reserve-seats/{event}',[FrontendController::class, 'reserveSeats']);
    Route::post('/update-profile/',[FrontendController::class , 'update_account'])->name('frontend.update_account');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('events')->name('events/')->group(static function() {
            Route::get('/',                                             'EventsController@index')->name('index');
            Route::get('/create',                                       'EventsController@create')->name('create');
            Route::post('/',                                            'EventsController@store')->name('store');
            Route::get('/{event}/edit',                                 'EventsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EventsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{event}',                                     'EventsController@update')->name('update');
            Route::delete('/{event}',                                   'EventsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('reservations')->name('reservations/')->group(static function() {
            Route::get('/',                                             'ReservationsController@index')->name('index');
            Route::get('/create',                                       'ReservationsController@create')->name('create');
            Route::post('/',                                            'ReservationsController@store')->name('store');
            Route::get('/{reservation}/edit',                           'ReservationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReservationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{reservation}',                               'ReservationsController@update')->name('update');
            Route::delete('/{reservation}',                             'ReservationsController@destroy')->name('destroy');
        });
    });
});