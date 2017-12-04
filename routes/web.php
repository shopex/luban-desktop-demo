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
// Route::Group(['middleware'=>'auth'],function(){
	Route::get('/', array('as'=>'welcome',function () {
	    return view('welcome');
	}) );
	
	Auth::routes();
	Route::get('/profile', array( 'as'=>'admin-profile', function () {
	    return redirect(Luban::config()->get('sso_url').'profile');
	}));

	Route::get('/admin-site-menus', function(){
		return [];
	})->middleware('auth')->name('admin-site-menus');

	Route::get('/home', ['as'=>'home','uses' => 'HomeController@index']);
	

	Route::Group(['middleware'=>'permission'],function(){
		Admin::routes();
		Admin::super_routes();
		Route::resource('admin/user', 'Admin\\UserController');
	});
// });

