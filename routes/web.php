<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/view-notification/{id}', 'IncidentController@printNotification')->name('print.notification');
Route::get('/view-report/{id}', 'ReportController@printReport')->name('print.report');
Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::resource('incidents', 'IncidentController');

    Route::put('/update-profile/{id}', 'UserController@userUpdate')->name('profile.update');

    Route::get('/show-report/{id}', 'ReportController@showReport');

    Route::resource('/recommendations', 'RootCauseController');
    Route::get('/user-recommendations', 'RootCauseController@recUser');

    Route::put('incidents/uploadImage/{id}', 'IncidentController@uploadImage')->name('upload');

    Route::get('/profile/{id}', 'AdminController@profile')->name('show.profile');

    Route::resource('reports', 'ReportController');
    Route::post('remarks', 'ReportController@remarks')->name('remarks.store');
    Route::get('remarks-detail/{id}', 'ReportController@remarksDetail')->name('remarks.view');
    Route::get('awaiting', 'IncidentController@awaiting');

    Route::get('investigation/{id}', 'ReportController@incident');
    Route::get('report/{id}', 'ReportController@incidentReport');
    Route::get('/export/investigation', 'ReportController@reportAll');

    Route::get('/export/notification', 'IncidentController@export');

    // For Printing
    // Route::get('/print-report/{id}', 'ReportController@printReport')->name('print.report');
    // Route::get('/print-notification/{id}', 'IncidentController@printNotification')->name('print.notification');

 });

 Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::resource('employees', 'EmployeeController');
    Route::get('/import','EmployeeController@indexImport');
    Route::post('/import/employees', 'EmployeeController@import')->name('import.employees');
    Route::post('/search','EmployeeController@search');

    Route::resource('locations', 'LocationController');
    Route::resource('vaccines', 'VaccineController');
    Route::get('/import-locations','LocationController@importLocation');
    Route::post('/import/locations', 'LocationController@import')->name('import.locations');
    Route::resource('users', 'AdminController');
    Route::get('/notification', 'IncidentController@adminIndex');
    Route::get('/investigation', 'ReportController@adminIndex');
    Route::get('/review', 'ReportController@review');
    Route::get('/awaiting', 'IncidentController@awaitingAdmin');

    Route::get('send', 'HomeController@sendNotification');

    Route::get('backup', 'AdminController@backup');

    Route::put('assign-location/{id}', 'AdminController@assignLocation')->name('user.location');

});

