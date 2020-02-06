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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'FrontendController@index');

// Treatment
// Route::resource('/treatment','TreatmentController');

//Medicine Type

Route::resource('/medicineType','MedicineTypeController');
Route::resource('/medicine','MedicineController');
Route::get('/getMedicine','MedicineController@getMedicine')->name('getMedicine');

Route::resource('patient','PatientController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
