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

// login page
Route::get('/', 'FrontendController@index');

// medicines
Route::resource('/medicine','MedicineController');

// Medicine Types
Route::resource('/medicineType','MedicineTypeController');

// Treatments
Route::resource('/treatment','TreatmentController');

// Json responses
Route::get('/getMedicineType','MedicineTypeController@getMedicineType')->name('medicineType.getType');

Route::get('/getMedicine','MedicineController@getMedicine')->name('getMedicine');

Route::get('/getuser','ReceptionController@getuser')->name('getuser');

//Owner
Route::resource('owners','OwnerController');




Route::get('/getOwners','OwnerController@getOwners')->name('getOwners');


//Doctor
Route::resource('doctor','DoctorController');

Route::get('/getDoctor','DoctorController@getDoctor')->name('getDoctor');


//Patient
Route::resource('patient','PatientController');
Route::post('incharge','PatientController@incharge')->name('incharge');

Route::resource('reception','ReceptionController');

Route::get('print','PrintOutController@index')->name('print');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profit-expense
Route::resource('/expense','ExpenseController');

Route::get('/getExpense','ExpenseController@getExpense')->name('getExpense');
Route::post('/searchReport','ExpenseController@searchReport')->name('searchReport');

Route::get('/appointpatient','AppointmentController@index')->name('appointpatient');

Route::get('/appointpatienthistory/{treatment_id}/{patient_id}','AppointmentController@patient')->name('appointpatienthistory');
Route::post('/appmedicine','AppointmentController@getmedicine')->name('appmedicine');
