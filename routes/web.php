<?php

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

Route::get('/', 'Front\FrontendController@index')->name('front.index');
Route::post('/find/car', 'Front\FrontendController@findCar')->name('front.find.car');
Route::post('/booking/submit', 'Front\FrontendController@booking')->name('booking.submit');
Route::get('/payment/success', 'Front\FrontendController@success')->name('payment.success');

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['auth']], function () {
         Route::get('/', 'HomeController@index')->name('home');
         Route::get('/marque', 'Admin\MarqueController@index')->name('admin.marque');
         Route::post('/marque/store', 'Admin\MarqueController@store')->name('marque.store');
         Route::get('/marque/delete/{id}', 'Admin\MarqueController@delete')->name('marque.delete');

         Route::get('/modal', 'Admin\ModalController@index')->name('admin.modal');
         Route::post('/modal/store', 'Admin\ModalController@store')->name('modal.store');
         Route::get('/modal/delete/{id}', 'Admin\ModalController@delete')->name('modal.delete');
         Route::post('/modal/update/{id}', 'Admin\ModalController@update')->name('modal.update');

         Route::get('/vehicles', 'Admin\VehicleController@index')->name('admin.vehicles');
         Route::get('/vehicle/create', 'Admin\VehicleController@create')->name('vehicle.create');
         Route::post('/vehicle/store', 'Admin\VehicleController@store')->name('vehicle.store');
         Route::post('/update/vehicule/{id}', 'Admin\VehicleController@update')->name('update.vehicule');
         Route::get('/vehicule/delete/{id}', 'Admin\VehicleController@delete')->name('vehicle.delete');
         Route::post('/fetchmodals', 'Admin\VehicleController@fetchmodals')->name('fetchmodals');

         Route::get('/options', 'Admin\OptionController@index')->name('admin.options');
         Route::post('/options/store', 'Admin\OptionController@store')->name('option.store');
         Route::post('/options/update/{id}', 'Admin\OptionController@update')->name('option.update');
         Route::post('/options/delete/{id}', 'Admin\OptionController@delete')->name('option.delete');

         Route::get('/gurantee', 'Admin\GuranteeController@index')->name('admin.gurantee');
         Route::post('/gurantee/store', 'Admin\GuranteeController@store')->name('gurantee.store');
         Route::post('/gurantee/update/{id}', 'Admin\GuranteeController@update')->name('gurantee.update');
         Route::post('/gurantee/delete/{id}', 'Admin\GuranteeController@delete')->name('gurantee.delete');

         Route::get('/season', 'Admin\SeasonController@index')->name('season.index');
         Route::post('/season/store', 'Admin\SeasonController@store')->name('season.store');
         Route::post('/season/update/{id}', 'Admin\SeasonController@update')->name('season.update');
         Route::get('/season/delete/{id}', 'Admin\SeasonController@delete')->name('season.delete');

         Route::get('/direct/reservation', 'Admin\ReservationController@direct')->name('direct.reservation');
         Route::get('/reservations', 'Admin\ReservationController@reservations')->name('admin.reservations');
         Route::get('/delete/reservation/{id}', 'Admin\ReservationController@reservationsDelete')->name('delete.reservation');
         Route::get('/show/reservation/{id}', 'Admin\ReservationController@show')->name('reservation.show');
         Route::get('/admin/calender', 'Admin\ReservationController@calender')->name('admin.calender');
         Route::post('/reservation/store', 'Admin\ReservationController@store')->name('reservation.store');
         Route::get('/json', 'Admin\ReservationController@json')->name('json');
    });

});
