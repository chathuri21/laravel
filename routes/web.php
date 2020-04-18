<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about')->name('about');

Route::get('/services', 'PageController@services');

Route::resource('post', 'PostController');

Route::resource('books', 'BooksController');

Route::post('authors', 'AuthorsController@store');

Route::get('/hello', function () {
    return "Hi world";
});

Route::get('/html', function () {
    return "<h1>Hi world</h1>";
});

Route::get('/user/{id?}/{name?}', function($iduu=null, $nameii="nimal"){
    return 'User is '.$nameii.' id- '.$iduu;
});

Route::match(['get', 'post','delete'], '/match-route', function () {
    return 'This is match route';
});

Route::any('any-route', function () {
    return "any route";
});

Route::get('users/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('user/profile', function () {
    return "name";
})->name('profile');

Route::group(['prefix' => 'admin', 'as' => 'admin::'], function () {
    Route::get('dashboard', function () {
        return "dashboard";
    })->name('dashboard');

    Route::get('reports', function () {
        return "reports";
    })->name('reports');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
