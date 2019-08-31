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

Route::get('/', 'HomeController@dashboard')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');




Route::get('/dashboard/users', 'HomeController@user')->name('user');
Route::get('/dashboard/user/{id}/edit', 'HomeController@view')->name('view');
Route::post('/dashboard/user/update', 'HomeController@update')->name('update');
Route::post('/dashboard/user/delete', 'HomeController@delete')->name('delete');
Route::post('/dashboard/user/create', 'HomeController@create')->name('create');


Route::get('/dashboard/data1', 'Data1Controller@index')->name('data1');
Route::get('/dashboard/data2', 'Data2Controller@index')->name('data2');








Route::get('/form', 'DynamicfieldController@index')->name("form");
Route::post('/form/submit', 'DynamicfieldController@store')->name("form.submit");

Route::get('/not_approved', 'HomeController@not_approved')->name("not_approved");
