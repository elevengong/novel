<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});






/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::any('/backend/login', 'backend\LoginController@login');
    Route::get('/backend/code', 'backend\LoginController@code');

});

Route::group(['middleware' => ['web','admin.login']], function () {
    Route::get('/backend/welcome', 'backend\IndexController@welcome');
    Route::get('/backend/index', 'backend\IndexController@index');
    Route::get('/backend/logout', 'backend\LoginController@logout');

    Route::resource('/backend/category', 'backend\CategoryController');

    Rote::get('/backend/author','backend\AuthorController@index');

});
