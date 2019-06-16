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
   return view('index');
});


//Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
//Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@authenticate']);
//Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
//
//// Registration Routes...
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
//
//// Password Reset Routes...
//Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
//Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
//Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
//Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

//
///**
// * Group Routes
// */
//Route::group(['middleware' => 'auth'], function () {
//    /**
//     * Test Routes
//     */
//
//    Route::get('/api/trainings/tests', [
//        'middleware' => 'permission:student',
//        'uses' => 'TrainingTestController@index',
//    ]);
//
//    Route::get('/api/trainings/tests/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingTestController@show',
//    ]);
//
//
//
//    Route::post('/api/trainings/tests', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingTestController@store',
//    ]);
//
//    Route::put('/api/trainings/tests/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingTestController@update',
//    ]);
//
//    Route::delete('/api/trainings/tests/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingTestController@destroy',
//    ]);
//
//
//    /**
//     *  Tranings Results Tests
//     */
//
//    Route::post('/api/trainings/results/tests/{id}', [
//        'middleware' => 'permission:student',
//        'uses' => 'TrainingTestController@results',
//    ]);
//
//
//
//    /**
//     * Question Routes
//     */
//
//    Route::get('/api/trainings/questions', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingQuestionController@index',
//    ]);
//
//
//    Route::get('/api/trainings/questions/{id}', [
//        'middleware' => 'permission:student',
//        'uses' => 'TrainingQuestionController@show',
//    ]);
//
//    Route::post('/api/trainings/questions/{testId}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingQuestionController@store',
//    ]);
//
//    Route::post('/api/trainings/questions/{id}/{photoUpdate}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingQuestionController@update',
//    ]);
//
//    Route::delete('/api/trainings/questions/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingQuestionController@destroy',
//    ]);
//
//
//    /**
//     * Answer Routes
//     */
//
//    Route::get('/api/trainings/answers', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingAnswerController@index',
//    ]);
//
//    Route::get('/api/trainings/answers/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingAnswerController@show',
//    ]);
//
//    Route::post('/api/trainings/answers/{questionId}',[
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingAnswerController@store',
//    ]);
//
//    Route::put('/api/trainings/answers/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingAnswerController@update',
//    ]);
//
//    Route::delete('/api/trainings/answers/{id}', [
//        'middleware' => 'permission:admin',
//        'uses' => 'TrainingAnswerController@destroy',
//    ]);
//});

/**
 *  Website Routes
 */


