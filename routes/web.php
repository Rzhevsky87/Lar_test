<?php

use App\Models\Auth\Users; // ???

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

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Тестовый роут
 *
 */
Route::get('/test', function() {
    return view('test');
});

/**
 * Тестовый роут - 2
 * Не работает
 *
 */
Route::get('/test2', function() {
    return App\Models\Forum\Question::test(Users $a);
});
