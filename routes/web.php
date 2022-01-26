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

Route::get('/', function () {
    return view('Admin.Dashboard.index');
});
Route::prefix("admin")->name('Admin.')->group(function (){
    Route::resource('doctor','Doctor\\DoctorController');
    Route::resource('patient','Patients\\PatientsController');
    Route::resource('receptionist','Receptionist\\ReceptionistController');
});

