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
Route::get('/getuser','ReceptionController@getuser')->name('getuser');

//medicine
Route::resource('/medicine','MedicineController');

//Doctor
Route::resource('doctor','DoctorController');
Route::get('/getDoctor','DoctorController@getDoctor')->name('getDoctor');


Route::get('/getMedicine','MedicineController@getMedicine')->name('getMedicine');

Route::resource('patient','PatientController');
Route::resource('reception','ReceptionController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profit-expense

Route::resource('/expense','ExpenseController');
Route::get('/getExpense','ExpenseController@getExpense')->name('getExpense');
Route::post('/searchReport','ExpenseController@searchReport')->name('searchReport');
