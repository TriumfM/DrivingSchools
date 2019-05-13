<?php


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
Route::post('/auth/login', 'AuthController@login');


Route::group(['middleware' => 'auth:api'], function() {

    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show');
    Route::post('/users', 'UserController@store');
    Route::put('/users/{id}', 'UserController@update');
    Route::delete('/users/{id}', 'UserController@destroy');

    Route::get('/auth/details', 'AuthController@details');
    Route::get('/auth/logout', 'AuthController@logout');


    /**
     *  Video Routes
     */
    Route::group(['middleware' => 'permission:admin'],function () {

        Route::get('/videos', 'VideoController@index');
        Route::get('/videos/{id}', 'VideoController@show');
        Route::post('/videos','VideoController@store');
        Route::put('/videos/{id}', 'VideoController@update');
        Route::delete('/videos/{id}','VideoController@destroy');


    });
    /**
     * Test Routes
     */

    Route::get('/trainings/tests', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingTestController@index',
    ]);

    Route::get('/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@show',
    ]);
    Route::post('/trainings/tests', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@store',
    ]);
    Route::put('/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@update',
    ]);
    Route::delete('/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@destroy',
    ]);

    /**
     *  Tranings Results Tests
     */

    Route::post('/trainings/results/tests/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingTestController@results',
    ]);

    /**
     * Question Routes
     */

    Route::get('/trainings/questions', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@index',
    ]);

    Route::get('/trainings/questions/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingQuestionController@show',
    ]);

    Route::post('/trainings/questions/{testId}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@store',
    ]);

    Route::post('/trainings/questions/{id}/{photoUpdate}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@update',
    ]);

    Route::delete('/trainings/questions/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@destroy',
    ]);


    /**
     * Answer Routes
     */

    Route::get('/trainings/answers', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@index',
    ]);

    Route::get('/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@show',
    ]);

    Route::post('/trainings/answers/{questionId}',[
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@store',
    ]);

    Route::put('/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@update',
    ]);

    Route::delete('/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@destroy',
    ]);

});
