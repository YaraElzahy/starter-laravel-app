<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use app\Http\Controllers\Front\MyController;
use app\Http\Controllers\Front\SecondController;
use app\Http\Controllers\Admin\SecondAdminController;
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

Route::get('/test1', function () {
    return 'welcome';
});

// Route parameters

// required parameter here is id
Route::get('/show-number/{id}', function ($id) {
    return $id;
}) -> name('a');
// if we typed the path without id, output: error 404
// if we type an id ex: localhost:8000/test1/5, output: page with "5" printed on it

// optional parameter
Route::get('/show-string/{id?}', function () {
    return 'welcome';
}) -> name('b');

// Route name (used to shorten path typed)
// this new name is used in the view blade

// namespace folder names should always begin with a capital letter

Route::get('/users', 'UserController@showUserName');
// Route::namespace('Front')->group(function(){
//     Route::get('/users','UserController@showUserName');
// });

Route::get('/users2', 'Front\MyController@showName');
// Route::namespace('Front')->group(function(){
//     // all routes only access controllers and methods in folder named "Front"
//     Route::get('users2','MyController@showName');
// });

/*********** We use prefixes so we can shorten the path wriiten so we write "show" instead of "users/show" ***********/

// Route::prefix('users')->group(function(){
//     Route::get('show', 'App\Http\Controllers\Front\MyController@showName');
//     Route::delete('delete', 'App\Http\Controllers\Front\MyController@showName');
//     Route::get('edit', 'App\Http\Controllers\Front\MyController@showName');
//     Route::put('update', 'App\Http\Controllers\Front\MyController@showName');
// });

// Is also written as (better)
Route::group(['prefix' => 'users'/*, 'middleware' => 'auth'*/], function(){
    // set of routes
    Route::get('/', function(){
        return "work";
    });
    Route::get('show', 'Front\MyController@showName');
    Route::delete('delete', 'Front\MyController@showName');
    Route::get('edit', 'Front\MyController@showName');
    Route::put('update', 'Front\MyController@showName');
});

// prevents accessing url without authentication of user ex: login
// Route::get('check', function(){
//     return "middleware";
// }) -> middleware('auth');
// but it's more professional to use middleware as a prefix next to users up there in the group,
// this ensures that only authenticated users can access the url: localhost:8000/users

Route::get('/second', 'Front\SecondController@showString');
// or
// Route::group(['namespace' => 'Front'], function(){
//     Route::get('/second', 'SecondController@showString');
// });
// Route::get('/second',[SecondController::class, 'showString']);

Route::group(['namespace' => 'Admin'], function(){
    Route::get('/secondAdmin2', 'SecondAdminController@showString2'); // no authentication check in constructor
    Route::get('/secondAdmin0', 'SecondAdminController@showString0'); // needs authentication
    Route::get('/secondAdmin1', 'SecondAdminController@showString1'); // needs authentication
    Route::get('/secondAdmin3', 'SecondAdminController@showString3') -> middleware('auth'); // needs authentication
});

// if not authenticated, route will navigate to login
Route::get('login', function(){
    return 'You must be logged in to access this Route!';
}) -> name('login'); // lazem ne7ot name hena for it to work

/* This single route replaces the 6 commented out routes after that */
Route::resource('news', 'NewsController');
/*
Route::get('news', 'NewsController@show');
Route::post('news/{id}', 'NewsController@store');
Route::get('news/create', 'NewsController@create');
Route::get('news/{id}/edit', 'NewsController@edit');
Route::post('update/{id}', 'NewsController@update');
Route::delete('delete/{id}', 'NewsController@delete');
*/

// if we only need the create method, use the old route method
//    Route::get('create', 'controller@method');

Route::get('index', 'Front\Mycontroller@getIndex');

Route::get('/landing', function(){
    return view('landing');
});

Route::get('/about', function(){
    return view('about');
});