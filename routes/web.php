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

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
Register routes GET and POST
	GET generates small registration page
	POST handles the registration form input
*/

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

/*
Login routes GET and POST
	GET generates small login page
	POST handles the form input
*/

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

/*
Admin routes that are protected by a small piece of middleware I wrote that just saw if the user was an admin type of user
*/

Route::get('/admin', 'SessionsController@admin')->middleware('checkAdmin');

Route::get('/admin/{id}', ['uses' =>'SessionsController@adminuseredit'])->middleware('checkAdmin');

Route::post('/admin/{id}', ['uses' =>'SessionsController@adminusereditconfirm'])->middleware('checkAdmin');

/*
My profile route open to anyone
*/

Route::get('/myprofile', 'SessionsController@myprofile')->name('myprofile');

Route::post('/myprofile', ['uses' =>'SessionsController@selfedit']);


