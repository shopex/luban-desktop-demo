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
Admin::routes();

Route::get('/profile', function () {
    return redirect(Luban::config()->get('sso_url').'profile');
});

Route::get('/admin-site-menus', function(){
	return [];
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');