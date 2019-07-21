<?php

use App\Model\Category;
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


Route::apiResource('categories', 'CategoryController');
Route::get('/categories/{category}/questions', function (Category $category) {
    return $category->questions()->get(); // ага, latest() это сортировка
});


Route::apiResource('questions', 'QuestionController');
Route::get('questions/{question}/votes', 'QuestionVoteController@index');
Route::post('questions/{question}/voteup', 'QuestionVoteController@voteup');
Route::post('questions/{question}/votedown', 'QuestionVoteController@votedown');


Route::apiResource('questions/{question}/answers', 'AnswerController');

Route::get('answers/{answer}/votes', 'AnswerVoteController@index');
Route::post('answers/{answer}/voteup', 'AnswerVoteController@voteup');
Route::post('answers/{answer}/votedown', 'AnswerVoteController@votedown');


// user login
Route::group([

                 'middleware' => 'api',
                 'prefix' => 'auth',

             ], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
