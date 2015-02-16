<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::pattern('id', '^[0-9]*[1-9][0-9]*$');
Route::pattern('store_id', '^[0-9]*[1-9][0-9]*$');
Route::pattern('banner_id', '^[0-9]*[1-9][0-9]*$');
Route::pattern('tablename', '^\w+$');
//如果不是admin則會跳回首頁！
Route::filter('admin', function()
{
	$user = $user = Auth::user()->group;
	if( $user != 'admin' ) {
		return Redirect::to('');
	}
});

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('test',function(){
	echo Request::path();
});

Route::group(array('before' => 'auth|admin','prefix' => 'backend'),function(){
	/*
	選單管理
	 */

	Route::get('firstLevel','BackendMenuController@index');
	Route::post('firstLevel','BackendMenuController@update');

	Route::get('secondLevel/{id}','BackendMenuController@secondLevel');
	Route::post('secondLevel/{id}','BackendMenuController@updateSecond');

	/*
	圖像廣告 Route
	 */
	Route::post('banner/ajaxSpry2','BannerController@ajaxSpry2');
	Route::get('banner','BannerController@index');
	Route::get('banner/create','BannerController@createBanner');
	Route::post('banner/new','BannerController@insertBanner');
	Route::get('banner/edit/{banner_id}','BannerController@editBanner');
	Route::post('banner/update/{banner_id}','BannerController@updateBanner');
	Route::get('banner/destroy/{banner_id}','BannerController@destroyBanner');

	Route::get('multiBanner/create','BannerController@multiBanner');
	Route::post('multiBanner/create','BannerController@multiBannerCreate');
	/*
	文字廣告 Route
	 */
	Route::get('textBanner','TextBannerController@index');
	Route::get('textBanner/create','TextBannerController@createBanner');
	Route::post('textBanner/new','TextBannerController@insertBanner');
	Route::get('textBanner/edit/{banner_id}','TextBannerController@editBanner');
	Route::post('textBanner/update/{banner_id}','TextBannerController@updateBanner');
	Route::get('textBanner/destroy/{banner_id}','TextBannerController@destroyBanner');

	/*
	商家管理 Route
	 */
	Route::get('','BackendController@index');
	Route::get('{id}/{tablename}','BackendController@site');
	Route::get('{id}/{tablename}/create','BackendController@create');
	Route::post('{id}/{tablename}/new','BackendController@insertForm');
	Route::get('{id}/{tablename}/edit/{store_id}','BackendController@edit');
	Route::post('{id}/{tablename}/update/{store_id}','BackendController@updateForm');
	Route::get('{id}/{tablename}/destroy/{store_id}','BackendController@destroy');
});



// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::get('login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
