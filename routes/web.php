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

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('blog/{id}', 'BlogController@getSingle')->name('blog.single');
    Route::get('blog', 'BlogController@getIndex')->name('blog.index');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex')->name('welcome');
    
});

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contibutor')->group(function() {
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController', ['except' => ['create']]);
    Route::resource('/tags', 'TagController', ['except' => ['create']]);
});