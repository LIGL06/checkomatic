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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware'=>'admin'], function(){
  Route::get('/checks/create','CheckController@create');
  Route::get('/checks/{id}/edit','CheckController@edit');
  Route::post('/checks','CheckController@store');
  Route::put('/checks/{id}','CheckController@update');
  Route::delete('/checks/{id}','CheckController@destroy');
});
Route::group(['middleware'=>'auth'],function(){
  Route::get('/checks','CheckController@index');
  Route::get('/checks/{id}','CheckController@show');
  Route::get('/checks/filter/{id}','CheckController@showBy');
  Route::get('/checks/names/{id}','CheckController@showName');
});

Route::get('/home', 'HomeController@index')->name('home');
