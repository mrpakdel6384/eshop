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

Route::namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/panel' , 'PanelController@index');
    Route::post('/panel/upload-image' , 'PanelController@uploadImageSubject');
    Route::resource('/articles', 'ArticleController');
    Route::resource('/courses', 'CourseController');
    Route::resource('/episodes','EpisodeController');

    Route::group(['prefix'=>'users'],function(){
        Route::get('/','UserController@index');
        Route::delete('/{user}/destroy','UserController@destroy')->name('users.destroy');
    });
});

