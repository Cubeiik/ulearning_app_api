<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace'=>'Api'], function(){

    //Route::post('/login', [UserController::class, 'createUser']);
    Route::post('/login', 'UserController@createUser');
    
    //authentication middleware
    Route::group(['middleware'=>'auth:sanctum'], function(){
        Route::any('/courseList', 'CourseController@courseList');
        Route::any('/courseDetail', 'CourseController@courseDetail');
        Route::any('/checkout', 'PayController@checkout');
        Route::any('/lessonList', 'LessonController@lessonList');
        Route::any('/lessonDetail', 'LessonController@lessonDetail');

    });

    //https://473d-2a00-f41-8039-4ef7-5567-85b3-bcfc-afd9.ngrok-free.app
    Route::any('/web_go_hooks', 'PayController@web_go_hooks');


});

//Route::post('/auth/login', [UserController::class, 'loginUser']);
