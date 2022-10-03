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
    return view('layout.layout');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/personal', function () {
    return view('auth.personal_data');
});
Route::get('/family', function () {
    return view('auth.family');
});
Route::get('/users', function () {
    return view('users');
});
Route::get('/clinicalHistorie', function () {
    return view('clinicalHistorie');
});
Route::get('/medicalAppointment', function () {
    return view('medicalAppointment');
});
Route::get('/recipes', function () {
    return view('recipes');
});
