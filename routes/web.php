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
});

Auth::routes();

Route::resource('/notas', 'NotaController')->middleware('auth');
Route::resource('/personajes', 'CharacterController')->middleware('auth');
Route::resource('/razas', 'RazaController')->middleware('auth');

//Route::resource('/personajes/{id}', 'CharacterController')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

