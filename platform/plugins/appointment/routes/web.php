<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\Appointment\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'appointments', 'as' => 'appointment.'], function () {
            Route::resource('', 'AppointmentController')->parameters(['' => 'appointment']);
        });
    });

});

Route::get('/test-rdv', function () {
    Theme::set('content', view('plugins/appointment::form')->render());
    return Theme::scope('custom-appointment')->render();
});

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Botble\Appointment\Http\Controllers'], function () {
    Route::get('prendre-rendez-vous', 'AppointmentController@index')->name('appointment.index');
    Route::get('prendre-rendez-vous', 'AppointmentController@form')->name('appointment.form');
    Route::post('prendre-rendez-vous', 'AppointmentController@clientStore')->name('appointment.clientStore');
});
