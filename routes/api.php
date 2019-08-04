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


Route::apiResource('questions', 'api\QuestionController');
Route::get('questions/{question}/votes', 'api\QuestionVoteController@index');
Route::post('questions/{question}/voteup', 'api\QuestionVoteController@voteup');
Route::post('questions/{question}/votedown', 'api\QuestionVoteController@votedown');


Route::apiResource('questions/{question}/answers', 'api\AnswerController');

Route::get('answers/{answer}/votes', 'api\AnswerVoteController@index');
Route::post('answers/{answer}/voteup', 'api\AnswerVoteController@voteup');
Route::post('answers/{answer}/votedown', 'api\AnswerVoteController@votedown');


// user login
Route::group([

                 'middleware' => 'api',
                 'prefix' => 'auth',

             ], function ($router) {

    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');

    Route::post('signup', 'api\AuthController@signup');


});

