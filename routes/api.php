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

// Messages Add route
Route::post('/messages', 'HomepageMessagesController@store');

Route::post('/auth/login', 'AuthController@login');

// New Driving School Routes
Route::group(['middleware' => 'auth:api'], function() {

    // Auth Routes
    Route::get('/auth/details', 'AuthController@details');
    Route::get('/auth/logout', 'AuthController@logout');

    //  Literature Student Routes
    Route::get('/literature', 'LiteratureController@index');
    Route::get('/literature/{id}', 'LiteratureController@show');
    Route::get('/literature/type/{type}', 'LiteratureController@getByType');


     //  Video Student Routes
    Route::get('/videos', 'VideoController@index');
    Route::get('/videos/{id}', 'VideoController@show');

    // Test Student Route
    Route::get('/trainings/tests','TrainingTestController@index');
    Route::get('/trainings/tests/{id}', 'TrainingTestController@show');

    // Trainings Results Tests
    Route::post('/trainings/results/tests', 'TrainingTestController@results');
    Route::post('/trainings/results/tests/{test_id}', 'TrainingTestController@resultsByTestId');

    Route::get('/student/tests/all', 'TrainingTestController@studentIndex');
    Route::get('/students/trainings/tests/{id}','TrainingTestController@showById');

    Route::group(['middleware' => 'permission:admin'],function () {

        // Users Routes
        Route::get('/users', 'UserController@index');
        Route::get('/users/{id}', 'UserController@show');
        Route::post('/users', 'UserController@store');
        Route::put('/users/{id}', 'UserController@update');
        Route::delete('/users/{id}', 'UserController@destroy');

        // Videos Admin Routes
        Route::post('/videos','VideoController@store');
        Route::put('/videos/{id}', 'VideoController@update');
        Route::delete('/videos/{id}','VideoController@destroy');

        // Literature Admin Routes
        Route::post('/literature', 'LiteratureController@store');
        Route::post('/literature/{id}', 'LiteratureController@update');
        Route::delete('/literature/{id}', 'LiteratureController@destroy');

        // Answer Admin Routes
        Route::get('/trainings/answers', 'TrainingAnswerController@index');
        Route::get('/trainings/answers/{id}', 'TrainingAnswerController@show');
        Route::get('/trainings/answers/questions/{question_id}', 'TrainingAnswerController@showByQuestionId');
        Route::post('/trainings/answers','TrainingAnswerController@store');
        Route::put('/trainings/answers/{question_id}', 'TrainingAnswerController@update');
        Route::delete('/trainings/answers/{id}', 'TrainingAnswerController@destroy');

        // Test Routes
        Route::post('/trainings/tests', 'TrainingTestController@store');
        Route::put('/trainings/tests/{id}','TrainingTestController@update');
        Route::delete('/trainings/tests/{id}', 'TrainingTestController@destroy');

        // Messages Routes
        Route::get('/messages', 'HomepageMessagesController@index');
        Route::get('/messages/{id}', 'HomepageMessagesController@show');
        Route::put('/messages/{id}','HomepageMessagesController@update');
        Route::delete('/messages/{id}', 'HomepageMessagesController@destroy');

    });

    //  Question Routes
    Route::get('/trainings/questions', ['middleware' => 'permission:admin', 'uses' => 'TrainingQuestionController@index',]);
    Route::get('/trainings/questions/tests/{test_id}', ['middleware' => 'permission:admin', 'uses' => 'TrainingQuestionController@showByTestId',]);
    Route::get('/trainings/questions/{id}', ['middleware' => 'permission:student', 'uses' => 'TrainingQuestionController@show',]);
    Route::post('/trainings/questions', ['middleware' => 'permission:admin', 'uses' => 'TrainingQuestionController@store',]);
    Route::post('/trainings/questions/{id}', ['middleware' => 'permission:admin', 'uses' => 'TrainingQuestionController@update',]);
    Route::delete('/trainings/questions/{id}', ['middleware' => 'permission:admin', 'uses' => 'TrainingQuestionController@destroy',]);


});


