<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Routes for (data) queries; By default works as host/api/<query>*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//apiResource automatically creates routes for all CRUD parts
// todo: make slug update by database, not by Laravel.
// like resource for api/questions/by-slug/questionSlugController or QuestionController with specified GetRouteKeyName
Route::apiResource('questions', 'QuestionController');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('questions/{question}/answers', 'AnswerController');

//vote up/vote down for both answer and question
