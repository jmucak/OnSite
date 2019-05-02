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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::resource('users', 'UsersController');

// Profile
Route::get('/profile/{slug}', 'ProfileController@index')->name('profile');
Route::get('/profile/edit/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/update/profile', 'ProfileController@update')->name('profile.update');

// Story
Route::resource('stories', 'StoryController');

// Chapter
Route::get('/stories/{slug}/create/chapter', 'ChapterController@create')->name('chapter.create');
Route::post('/stories/{slug}/chapter/{id}', 'ChapterController@store')->name('chapter.store');
Route::get('/stories/chapter/edit/{id}', 'ChapterController@edit')->name('chapter.edit');
Route::patch('/stories/chapter/{id}', 'ChapterController@update')->name('chapter.update');
Route::delete('/stories/chapter/{id}', 'ChapterController@destroy')->name('chapter.destroy');