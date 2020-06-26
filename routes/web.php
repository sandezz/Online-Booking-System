<?php

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
return view('welcome');
});

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
   Route::get('/home', 'HomeController@index')->name('home');

Route::get('/update_profile', 'Auth\ProfileController@update_profile')->name('update_profile');

Route::post('/add_physio', 'PhysioController@add_physio')->name('add_physio');

Route::get('/change_availability', 'PhysioController@change_availability')->name('change_availability');

Route::post('/save_availability', 'PhysioController@save_availability')->name('save_availability');

Route::post('/get_unavailable_time', 'PhysioController@get_unavailable_time')->name('get_unavailable_time');

Route::get('/remove_availability', 'PhysioController@remove_availability')->name('remove_availability');

Route::get('/delete_availability/{ua_id}', 'PhysioController@delete_availability')->name('delete_availability');


Route::get('/insert_physio', 'PhysioController@index')->name('insert_physio');

Route::get('/physio_list', 'PhysioController@physio_list')->name('physio_list');

Route::get('/update_physio/{physio_id}', 'PhysioController@update_physio')->name('update_physio');

Route::post('/save_update_physio/{physio_id}', 'PhysioController@save_update_physio')->name('save_update_physio');


Route::get('/change_password', 'Auth\ChangePassword@change_password')->name('change_password');

Route::get('/make_appointment', 'AppointmentController@make_appointment')->name('make_appointment');

Route::post('/save_updated_profile', 'Auth\ProfileController@save_update_profile')->name('save_updated_profile');

Route::get('/profile', 'Auth\ProfileController@profile')->name('profile');


Route::post('/save_password', 'Auth\ChangePassword@save_password')->name('save_updated_profile');

Route::post('/check_availability', 'AppointmentController@check_availability')->name('check_availability');

Route::post('/save_appointment', 'AppointmentController@save_appointment')->name('save_appointment');

Route::post('/check_booked_time', 'AppointmentController@check_booked_time')->name('check_booked_time');

Route::get('/appointment_list', 'AppointmentController@appointment_list')->name('appointment_list');

Route::get('/cancel_appointment/{physio_id}', 'AppointmentController@cancel_appointment')->name('cancel_appointment');

Route::get('/block_user/{user_id}', 'Auth\ProfileController@block_user')->name('block_user');

Route::get('/all_customer', 'Auth\ProfileController@get_all_customer')->name('all_customer');

Route::get('/physio_profile/{user_id}', 'Auth\ProfileController@physio_profile')->name('physio_profile');

Route::get('/customer_profile/{user_id}', 'Auth\ProfileController@customer_profile')->name('customer_profile');

Route::get('/unblock_user/{user_id}', 'Auth\ProfileController@unblock_user')->name('unblock_user');

Route::get('/view_appointment/{user_id}', 'AppointmentController@view_appointments')->name('view_appointment');

Route::get('/appointment_details/{app_id}', 'AppointmentController@get_appointment')->name('appointment_details');

Route::post('/update_appointment/{app_id}', 'AppointmentController@update_appointment')->name('update_appointment');

 Route::get('/all_appointments', 'AppointmentController@all_appointments')->name('all_appointments');
 
 Route::get('/physio_appointments', 'AppointmentController@physio_appointments')->name('physio_appointments');

 Route::get('/view_appointment/{user_id}', 'AppointmentController@view_appointments')->name('view_appointment');
});
