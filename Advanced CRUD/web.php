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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tech', 'TechController@index');
Route::get('/tech/create', 'TechController@create');
Route::post('/tech', 'TechController@store');

Route::get('/imageone', 'ImageOneController@index');
Route::get('/imageone/create', 'ImageOneController@create');
Route::post('/imageone', 'ImageOneController@store');

Route::get('/imagemultiple', 'ImageMultipleController@index');
Route::get('/imagemultiple/create', 'ImageMultipleController@create');
Route::post('/imagemultiple', 'ImageMultipleController@store');


Route::resource('customer', 'CustomerController');

