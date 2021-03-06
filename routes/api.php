<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Doctor Auth
Route::post('doctorlogin', 'Api\Doctor\Auth\LoginController@login');
Route::post('doctorregister', 'Api\Doctor\Auth\RegisterController@register');
//Patient Auth
Route::post('patientlogin', 'Api\Patient\Auth\LoginController@login');
Route::post('patientregister', 'Api\Patient\Auth\RegisterController@register');

Route::get('patients', 'PatientController@index');
Route::get('patients/{id}', 'PatientController@show');
Route::get('patients/appointments/{id}', 'PatientController@patientAppointments');
Route::post('patients', 'PatientController@store');
Route::put('patients/{id}', 'PatientController@update');
Route::delete('patients/{id}', 'PatientController@destroy');

Route::get('doctors', 'DoctorController@index');
Route::get('doctor/{id}', 'DoctorController@show');
Route::get('doctor/appointmentslots/{id}', 'DoctorController@showAppointmentslots');
Route::get('doctor/freeslots/{id}', 'DoctorController@showFreeslots');
Route::post('doctors', 'DoctorController@store');
Route::put('doctors/{id}', 'DoctorController@update');
Route::delete('doctor/{id}', 'DoctorController@destroy');

Route::get('departments', 'DepartmentController@index');
Route::get('departments/{id}', 'DepartmentController@show');
Route::get('departments/doctors/{id}', 'DepartmentController@departmentDoctors');
Route::post('departments', 'DepartmentController@store');
Route::put('departments/{id}', 'DepartmentController@update');
Route::delete('departments/{id}', 'DepartmentController@destroy');


Route::get('managers', 'ManagerController@index');
Route::get('managers/{id}', 'ManagerController@show');
Route::post('managers', 'ManagerController@store');
Route::put('managers/{id}', 'ManagerController@update');
Route::delete('managers/{id}', 'ManagerController@destroy');


/*Route::get('timetables', 'TimetableController@index');
Route::get('timetables/timeslot/{id}', 'TimetableController@dshow');
Route::get('timetables/{id}', 'TimetableController@show');
Route::put('patients/{id}', 'PatientController@update');
Route::delete('patients/{id}', 'PatientController@destroy');*/

Route::get('timeslots', 'TimeslotController@index');
Route::get('doctor/{id}/timeslots', 'TimeslotController@dshow');
Route::get('timeslot/{id}','TimeslotController@show');
Route::post('timeslots', 'TimeslotController@store');
Route::put('timeslot/{id}', 'TimeslotController@update');
Route::delete('timeslot/{id}', 'TimeslotController@destroy');

Route::get('appointments', 'AppointmentController@index');
Route::get('appointment/{id}', 'AppointmentController@show');
Route::get('appointment/details/{id}', 'AppointmentController@appointmentDetails');
Route::get('appointment/{id}/feedback', 'FeedbackController@feedbackDetails');
Route::post('appointments', 'AppointmentController@store');
Route::put('appointment/{id}', 'AppointmentController@update');
Route::delete('appointment/{id}', 'AppointmentController@destroy');
