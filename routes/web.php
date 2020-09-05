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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get("students/list",'StudentController@index');

Route::get("students/view/{id}",'StudentController@view');

Route::get("students/add",'StudentController@create');

Route::post("students/save_data",'StudentController@store');

Route::get("students/edit/{id}",'StudentController@show');

Route::post("students/edit_data",'StudentController@update');

Route::get("students/delete/{id}",'StudentController@delete');

Route::get("students/audits",'StudentController@audit_logs');

Route::get("students/audit_full_view/{id}",'StudentController@view_detailed_audit');

Route::get("students/mail",'StudentController@mail');

Route::any("students/send_mail",'StudentController@send_mail');
