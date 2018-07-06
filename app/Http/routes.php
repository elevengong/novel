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

//--------------------------------------start后台----------------------------------
Route::group(['middleware' => ['web']], function () {
    Route::any('/backend/login', 'backend\LoginController@login');
    Route::get('/backend/code', 'backend\LoginController@code');

});

Route::group(['middleware' => ['web','admin.login']], function () {
    Route::get('/backend/welcome', 'backend\IndexController@welcome');
    Route::get('/backend/index', 'backend\IndexController@index');
    Route::get('/backend/logout', 'backend\LoginController@logout');

    Route::resource('/backend/category', 'backend\CategoryController');

    Route::any('/backend/author', 'backend\AuthorController@index');
    Route::any('/backend/author/{author_id}/edit', 'backend\AuthorController@edit')->where(['author_id' => '[0-9]+']);

    Route::any('/backend/novel', 'backend\NovelController@index');
    Route::any('/backend/novel/{novel_id}/edit', 'backend\NovelController@edit')->where(['novel_id' => '[0-9]+']);

    //测试路由
    Route::get('/backend/novel/{name}_{id}.html','backend\NovelController@idbyname')->where(['name' => '[a-z]+', 'id' => '[0-9]+']);



});





//--------------------------------------end后面----------------------------------