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

Route::get('/',  'Auth\LoginController@showLoginForm')->name('login');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// routes for users.
Route::group(array('prefix' => 'users'), function()
{
	Route::get('/', 'UsersController@index');
	Route::get('/add-users', 'UsersController@add');
	Route::post('/add-users-post', 'UsersController@addPost');
	Route::get('/delete-users/{id}', 'UsersController@delete');
	Route::get('/edit-users/{id}', 'UsersController@edit');
	Route::post('/edit-users-post', 'UsersController@editPost');
	Route::get('/change-status-users/{id}', 'UsersController@changeStatus');
	Route::get('/view-users/{id}', 'UsersController@view');
});
// end of users routes
// routes for user_contacts.
Route::group(array('prefix' => 'user_contacts'), function()
{
	Route::get('/', 'ContactController@index');
	Route::get('/add-user_contacts', 'ContactController@add');
	Route::post('/add-user_contacts-post', 'ContactController@addPost');
	Route::get('/delete-user_contacts/{id}', 'ContactController@delete');
	Route::get('/edit-user_contacts/{id}', 'ContactController@edit');
	Route::post('/edit-user_contacts-post', 'ContactController@editPost');
	Route::get('/change-status-user_contacts/{id}', 'ContactController@changeStatus');
	Route::get('/view-user_contacts/{id}', 'ContactController@view');
});
// end of user_contacts routes
// 
// routes for user_contacts.
Route::group(array('prefix' => 'shared_contacts'), function()
{
	Route::get('/', 'SharedContactController@index');
	Route::get('/add-shared_contacts', 'SharedContactController@add');
	Route::post('/add-shared_contacts-post', 'SharedContactController@addPost');
	Route::get('/delete-shared_contacts/{id}', 'SharedContactController@delete');
	Route::get('/edit-shared_contacts/{id}', 'SharedContactController@edit');
	Route::post('/edit-shared_contacts-post', 'SharedContactController@editPost');
	Route::get('/change-status-shared_contacts/{id}', 'SharedContactController@changeStatus');
	Route::get('/view-shared_contacts/{id}', 'SharedContactController@view');
});
// end of user_contacts routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
