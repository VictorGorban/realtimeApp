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

/*Routes for links*/

//Route::get('/', function () {
//    return view('home');
//});

// todo: view???
Route::get('/', 'QuestionController@index');
Route::view('/{any}', 'home');
