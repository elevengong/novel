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


//--------------------------------------start前端----------------------------------
Route::get('/', 'frontend\IndexController@index');
Route::get('/index.html', 'frontend\IndexController@index');

Route::get('/{pinyin}/{c_id}','frontend\IndexController@category')->where(['c_id' => '[0-9]+']);
Route::get('/novel/{pinyin}/{n_id}','frontend\IndexController@novel')->where(['n_id' => '[0-9]+']);
Route::get('/read/{pinyin}/{chapter_id}.html','frontend\IndexController@chapter')->where(['chapter_id' => '[0-9]+']);
Route::get('/novel/{n_id}/download','frontend\IndexController@noveldownload')->where(['n_id' => '[0-9]+']);

Route::get('/updatelist', 'frontend\IndexController@updatelist');
Route::get('/complete', 'frontend\IndexController@complete');
Route::any('/search', 'frontend\IndexController@search');



//--------------------------------------start前端----------------------------------


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

//login后才可以上的
Route::group(['middleware' => ['web','admin.login']], function () {
    Route::get('/backend/welcome', 'backend\IndexController@welcome');
    Route::get('/backend/index', 'backend\IndexController@index');
    Route::get('/backend/logout', 'backend\LoginController@logout');

    Route::post('/backend/changeadminpassword', 'backend\IndexController@changeAdminPassword');

    Route::resource('/backend/category', 'backend\CategoryController');

    Route::any('/backend/author', 'backend\AuthorController@index');
    Route::any('/backend/author/{author_id}/edit', 'backend\AuthorController@edit')->where(['author_id' => '[0-9]+']);

    Route::any('/backend/novel', 'backend\NovelController@index');
    Route::any('/backend/novel/{novel_id}/edit', 'backend\NovelController@edit')->where(['novel_id' => '[0-9]+']);
    Route::get('/backend/novel/{novel_id}/show', 'backend\NovelController@show')->where(['novel_id' => '[0-9]+']);;
    Route::get('/backend/novel/{novel_id}_{chapter_id}/chaptershow', 'backend\NovelController@chaptershow')->where(['chapter_id' => '[0-9]+'], ['novel_id' => '[0-9]+']);;

    Route::get('/backend/system/friendlink', 'backend\SystemController@friendlink');
    Route::any('/backend/system/friendlinkadd', 'backend\SystemController@friendlinkadd');
    Route::delete('/backend/system/friendlinkdel/{id}', 'backend\SystemController@friendlinkdel')->where(['id' => '[0-9]+']);
    Route::any('/backend/system/friendlinkedit/{id}', 'backend\SystemController@friendlinkedit')->where(['id' => '[0-9]+']);

    Route::any('/backend/frontend/footer', 'backend\StaticController@footer');


    //上传图片
    Route::any('/backend/uploadphoto/{type}','backend\BackendController@uploadphoto')->where(['type' => '[0-9]+']);




    //测试路由
    //Route::get('/backend/novel/{name}_{id}.html','backend\NovelController@idbyname')->where(['name' => '[a-z]+', 'id' => '[0-9]+']);



});



//--------------------------------------end后台----------------------------------