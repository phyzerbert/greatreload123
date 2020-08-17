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

Route::get('/', 'IndexController@show_login');
Route::get('/show_register', 'IndexController@show_register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login/save', 'IndexController@login_save')->name('login.save');
Route::post('/register/save', 'IndexController@register_save')->name('register.save');

Route::get('/login/index', 'HomeController@login_index')->name('login.index');
Route::get('/register/index', 'HomeController@register_index')->name('register.index');



