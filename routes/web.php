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

Admin::routes();
Auth::routes();
Route::get('/profile', function () {
    return redirect(Luban::config()->get('sso_url').'profile');
})->name('admin-profile');

Route::get('/admin-site-menus', function(){
	return [];
})->middleware('auth')->name('admin-site-menus');

Route::get('/home', 'HomeController@index')->name('home');