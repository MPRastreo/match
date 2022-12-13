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
    return view('login');
});

Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'LoginController@logout');
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4) {
            return view('dashboard');
        } else {
            return view('blocked');
        }
    });
    Route::get('/personal', function () {
        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('auth.personal_data');
        } else {
            return view('blocked');
        }
    });
    Route::get('/family', 'FamylyController@index');
    Route::post('/family/add', 'FamylyController@create');
    Route::post('/family/update', 'FamylyController@update');
    Route::get('/family/show/{id}', 'FamylyController@show');
    Route::post('/family/delete', 'FamylyController@destroy');
    Route::get('/family/show', 'FamylyController@showFamily');

    Route::get('/users', 'UserController@showUsers');
    Route::get('/clinicalHistorie', 'MedicalHController@index');
    Route::post('/clinicalHistorie/save', 'MedicalHController@saveClinicalHistorie');
    Route::get('/medicalAppointment', function ()
    {
        if(auth()->user()->role == 1 || auth()->user()->role == 2 || auth()->user()->role == 4)
        {
            return view('medicalAppointment');
        }
        else
        {
            return view('blocked');
        }
    });
    Route::get('/recipes', function ()
    {
        if(auth()->user()->role == 1 || auth()->user()->role == 2)
        {
            return view('recipes');
        }
        else
        {
            return view('blocked');
        }
    });

    Route::get('/quotation', 'QuotationController@showQuotation');
    Route::post('/quotation/add', 'QuotationController@addQuotation');
    Route::get('/quotation/delete/{id}', 'QuotationController@deleteAppo');

    Route::post('/quotation/assign','QuotationController@assignQuotation');

    Route::get('/recipes', function () {
        if (auth()->user()->role == 1 || auth()->user()->role == 2) {
            return view('recipes');
        } else {
            return view('blocked');
        }
    });

    Route::get('/users', 'UserController@showUsers');
    Route::get('/users/show', 'UserController@showUsers');
    Route::post('/users/add', 'UserController@addUser');
    Route::post('/users/edit/{id}', 'UserController@editUser');
    Route::get('/users/show/{id}', 'UserController@getUserByID');
    Route::get('/users/delete/{id}', 'UserController@deleteUser');

    Route::get('/lang/change', 'LangController@changeLanguage');
    Route::post('/personal/changefield', 'UserController@changeField');
    Route::get('/clinicalHistorie/getbyid/{id}', 'MedicalHController@getClinicalHistoryByID');
    Route::get('/clinicalhistorie/hereditarydiseases/{id}', 'MedicalHController@getHereditaryDiseasesByID');
    Route::post('/translate/alerts', 'LangController@translateAlerts');
});
