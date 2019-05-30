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

/**
 * Main route / На главную
 *
 *
 */
Route::get('/', 'forum\HomeController@index');

/**
 * Autentication
 *
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Тестовый роут - 1
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
 * Тестовый роут - 4
 *
 */
Route::get('/examp3', 'Example\Example@UserQuestions');

/**
 * Тестовый роут - 5
 *
 */
Route::get('examp4', 'Example\Example@User');

/**
 * Тестовый роут - 6
 *
 */
Route::get('examp5', 'Example\Example@categories');

/**
 * Тестовый роут - 7
 *
 */
Route::get('examp6', 'Example\Example@qestions');
