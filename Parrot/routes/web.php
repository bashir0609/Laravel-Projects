<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/view', 'ProductController@addproductview');
Route::post('/product/insert', 'ProductController@addproductinsert');
Route::get('/product/delete/{product_id}', 'ProductController@addproductdelete');
Route::get('/product/edit/{product_id}', 'ProductController@addproductedit');
Route::get('/product/restore/{product_id}', 'ProductController@addproductrestore');
Route::get('/product/permanentdelete/{product_id}', 'ProductController@addproductpermanentdelete');
Route::post('/product/edit/update', 'ProductController@addproductupdate');

//Frontend Routes


Route::get('/', 'ForntendController@index')->name('home');
Route::get('/product/details/{product_id}', 'ForntendController@productdetails')->name('home');

//Contact Routes
Route::get('contact', 'ContactUSController@create')->name('contact.create');
Route::post('contact', 'ContactUSController@store')->name('contact.store');
