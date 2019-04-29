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


/**
 * Group Routes
 */
Route::group(['middleware' => 'auth'], function () {

    /**
     * Dashboard Routes
     */

    Route::get('/dashboard', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@dashboard',
    ]);

    Route::get('/api/calendars', [
        'middleware' => 'permission:admin',
        'uses' => 'CalendarController@index',
    ]);

    Route::get('/api/calendars/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CalendarController@show',
    ]);

    Route::post('/api/calendars', [
        'middleware' => 'permission:admin',
        'uses' => 'CalendarController@store',
    ]);

    Route::put('/api/calendars/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CalendarController@update',
    ]);

    Route::delete('/api/calendars/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CalendarController@destroy',
    ]);


    /*
     * Api/Events Route
     */


    Route::get('/api/events', [
        'middleware' => 'permission:admin',
        'uses' => 'CustomFiltersController@eventsInstructors',
    ]);

    Route::post('/api/filter/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'CustomFiltersController@tableFilter',
    ]);

    /**
     * Instructor Routes
     */

    Route::get('/instructors', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@instructors',
    ]);

    Route::get('/instructors/add', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@addinstructors',
    ]);

    Route::get('/instructors/details/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@details',
    ]);

    Route::get('/api/instructors/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@index',
    ]);

    Route::get('/api/find/instructors/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@show',
    ]);

    Route::post('/api/instructors', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@store',
    ]);

    Route::put('/api/instructors/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@update',
    ]);

    Route::delete('/api/instructors/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'InstructorController@destroy',
    ]);


    /**
     * Students Routes
     */

    Route::get('/students', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@students',
    ]);

    Route::get('/students/add', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@addstudents',
    ]);

    Route::get('/students/details/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@details',
    ]);


    Route::get('/api/students/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@index',
    ]);

    Route::get('/api/find/students/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@show',
    ]);

    Route::post('/api/students', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@store',
    ]);

    Route::put('/api/students/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@update',
    ]);

    Route::delete('/api/students/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'StudentController@destroy',
    ]);

    /**
     * Payment Routes
     */

    Route::get('/api/payments', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@index',
    ]);

    Route::get('/api/payments/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@show',
    ]);

    Route::post('/api/payments/{studentId}', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@store',
    ]);

    Route::put('/api/payments/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@update',
    ]);

    Route::delete('/api/payments/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@destroy',
    ]);


    /*
     * Documents Payment Routes
     */

    Route::post('/api/documents/payments/{paymentId}', [
        'middleware' => 'permission:admin',
        'uses' => 'PaymentController@documentPayment',
    ]);

//Route::put('/api/documents/payments/{paymentId}', [
//    'middleware' => 'permission:admin',
//    'uses' => 'PaymentController@documentPaymentUpdate',
//]);


    /*
     * DrivingCategoryRoutes
     */

    Route::get('/categories', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@categories',
    ]);

    Route::get('/api/categories/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'DrivingCategoryController@index',
    ]);

    Route::get('/api/find/categories/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'DrivingCategoryController@show',
    ]);

    Route::post('/api/categories', [
        'middleware' => 'permission:admin',
        'uses' => 'DrivingCategoryController@store',
    ]);

    Route::put('/api/categories/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'DrivingCategoryController@update',
    ]);

    Route::delete('/api/categories/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'DrivingCategoryController@destroy',
    ]);

    /**
     * Vehicle Routes
     */

    Route::get('/vehicles', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@vehicles',
    ]);

    Route::get('/api/vehicles/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'VehicleController@index',
    ]);

    Route::get('/api/find/vehicles/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'VehicleController@show',
    ]);

    Route::post('/api/vehicles', [
        'middleware' => 'permission:admin',
        'uses' => 'VehicleController@store',
    ]);

    Route::put('/api/vehicles/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'VehicleController@update',
    ]);

    Route::delete('/api/vehicles/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'VehicleController@destroy',
    ]);


    /**
     * Document Routes
     */

    Route::get('/documents', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@documents',
    ]);

    Route::post('/api/documentable/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'DocumentController@store',
    ]);


    /**
     * Report Routes
     */

    Route::get('/reports', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@reports',
    ]);


    /**
     * UserManagement/Role Routes
     */

    Route::get('/usermanagement/role', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@role',
    ]);


    /**
     * Usermanagement/Users Routes
     */

    Route::get('/usermanagement/users', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@users',
    ]);

    Route::get('/api/users/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'UsersController@index',
    ]);

    Route::get('/api/find/users/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'UsersController@show',
    ]);

    Route::post('/api/users', [
        'middleware' => 'permission:admin',
        'uses' => 'UsersController@store',
    ]);

    Route::put('/api/users/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'UsersController@update',
    ]);

    Route::delete('/api/users/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'UsersController@destroy',
    ]);



    /**
     * Configuration/EmailConfiguration Routes
     */

    Route::get('/configuration/email', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@email',
    ]);




    /**
     * Configuration/Training Routes
     */

    Route::get('/configuration/training/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@training',
    ]);

    Route::get('/training/tests', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@trainingTest',
    ]);

    Route::get('/training/videos', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@trainingVideo',
    ]);



    /**
     *  Configuration Tests (testOnline)
     */

    Route::get('/configuration/tests', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@tests',
    ]);




    /**
     *  VideoNote Routes
     */

    Route::get('/api/notes', [
        'middleware' => 'permission:student',
        'uses' => 'VideoNoteController@index',
    ]);

    Route::get('/api/notes/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'VideoNoteController@show',
    ]);

    Route::post('/api/notes', [
        'middleware' => 'permission:admin',
        'uses' => 'VideoNoteController@store',
    ]);

    Route::put('/api/notes/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'VideoNoteController@update',
    ]);

    Route::delete('/api/notes/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'VideoNoteController@destroy',
    ]);

    /**
     * Test Routes
     */

    Route::get('/api/trainings/tests', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingTestController@index',
    ]);

    Route::get('/api/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@show',
    ]);



    Route::post('/api/trainings/tests', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@store',
    ]);

    Route::put('/api/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@update',
    ]);

    Route::delete('/api/trainings/tests/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingTestController@destroy',
    ]);


    /**
     *  Tranings Results Tests
     */

    Route::post('/api/trainings/results/tests/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingTestController@results',
    ]);



    /**
     * Question Routes
     */

    Route::get('/api/trainings/questions', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@index',
    ]);


    Route::get('/api/trainings/questions/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingQuestionController@show',
    ]);

    Route::post('/api/trainings/questions/{testId}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@store',
    ]);

    Route::post('/api/trainings/questions/{id}/{photoUpdate}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@update',
    ]);

    Route::delete('/api/trainings/questions/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingQuestionController@destroy',
    ]);


    /**
     * Answer Routes
     */

    Route::get('/api/trainings/answers', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@index',
    ]);

    Route::get('/api/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@show',
    ]);

    Route::post('/api/trainings/answers/{questionId}',[
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@store',
    ]);

    Route::put('/api/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@update',
    ]);

    Route::delete('/api/trainings/answers/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'TrainingAnswerController@destroy',
    ]);


    /**
     * Configuration/Website Routes
     */
    Route::get('/configuration/website', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@website',
    ]);


    /**
     * Configuration/Country Routes
     */

    Route::get('/configuration/countries', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@countries',
    ]);

    Route::get('/api/countries/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'CountryController@index',
    ]);

    Route::get('/api/find/countries/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CountryController@show',
    ]);

    Route::post('/api/countries', [
        'middleware' => 'permission:admin',
        'uses' => 'CountryController@store',
    ]);

    Route::put('/api/countries/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CountryController@update',
    ]);

    Route::delete('/api/countries/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CountryController@destroy',
    ]);



    /**
     * Configuration/City Routes
     */

    Route::get('/configuration/cities', [
        'middleware' => 'permission:admin',
        'uses' => 'TemplateController@cities',
    ]);

    Route::get('/api/cities/{offset}', [
        'middleware' => 'permission:admin',
        'uses' => 'CityController@index',
    ]);

    Route::get('/api/find/cities/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CityController@show',
    ]);

    Route::post('/api/cities', [
        'middleware' => 'permission:admin',
        'uses' => 'CityController@store',
    ]);

    Route::put('/api/cities/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CityController@update',
    ]);

    Route::delete('/api/cities/{id}', [
        'middleware' => 'permission:admin',
        'uses' => 'CityController@destroy',
    ]);


    /**
     * Student Permission's Route
     */

    Route::get('/student/tests/all', [
        'middleware' => 'permission:student',
        'uses' => 'TrainingTestController@studentIndex',
    ]);

    Route::get('/student/tests/{id}', [
        'middleware' => 'permission:student',
        'uses' => 'WebsiteController@testsListById',
    ]);

    Route::get('/student/tests', [
        'middleware' => 'permission:student',
        'uses' => 'WebsiteController@testsList',
    ]);

    Route::get('/student/videos', [
        'middleware' => 'permission:student',
        'uses' => 'WebsiteController@videoList',
    ]);
});




/**
 *  Website Routes
 */

Route::get('/', [
    'uses' => 'WebsiteController@home',
]);

Route::get('/api/students/trainings/tests/{id}', [

    'uses' => 'TrainingTestController@showById',
]);

