<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

Route::get('/', function ()
{
    return view('login');
});

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/logout', 'LoginController@logout');
    Route::get('/dashboard', function ()
    {
        return view('dashboard');
    });
    Route::get('/personal', function ()
    {
        return view('auth.personal_data');
    });
    Route::get('/family','FamylyController@index');
    Route::post('/family/add', 'FamylyController@create');
    Route::post('/family/update', 'FamylyController@update');
    Route::get('/family/show/{id}', 'FamylyController@show');
    Route::post('/family/delete', 'FamylyController@destroy');
    Route::get('/family/show', 'FamylyController@showFamily');

    Route::get('/users', 'UserController@showUsers');
    Route::get('/clinicalHistorie', function ()
    {
        return view('auth.clinicalHistorie');
    });
    Route::get('/medicalAppointment', function ()
    {
        return view('medicalAppointment');
    });
    Route::get('/recipes', function ()
    {
        return view('recipes');
    });

    Route::get('/users/show', 'UserController@showUsers');
    Route::post('/users/add', 'UserController@addUser');
    Route::post('/users/edit/{id}', 'UserController@editUser');
    Route::get('/users/show/{id}', 'UserController@getUserByID');
    Route::get('/users/delete/{id}', 'UserController@deleteUser');

    Route::get('/lang/change', 'LangController@changeLanguage');
    Route::post('/personal/changefield', 'UserController@changeField');
});
