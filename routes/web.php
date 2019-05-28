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
 *
 */
Route::get('/examp', 'Example\Example@index'); // Тестовый маршрут

/**
 * Тестовый роут - 3
 *
 */
Route::get('/examp2', 'Example\Example@test2'); // Тестовый маршрут

/**
 *
 *
 */
Route::get('/examp3', 'Example\Example@userQuestion');
