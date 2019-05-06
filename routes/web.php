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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/my/friends', 'HomeController@friends')->name('friends');

// Users
Route::resource('users', 'UsersController');

// Profile
Route::get('/profile/{slug}', 'ProfileController@index')->name('profile');
Route::get('/profile/edit/profile', 'ProfileController@edit')->name('profile.edit');
Route::post('/profile/update/profile', 'ProfileController@update')->name('profile.update');

// Story
Route::resource('stories', 'StoryController');

Route::get('/check_publish_status/{id}', 'StoryController@check')->name('stories.check');
Route::get('/stories/publish/{id}', 'StoryController@publish')->name('stories.publish');

// Chapter
Route::get('/stories/{slug}/create/chapter', 'ChapterController@create')->name('chapter.create');
Route::post('/stories/{slug}/chapter/{id}', 'ChapterController@store')->name('chapter.store');
Route::get('/stories/chapter/edit/{id}', 'ChapterController@edit')->name('chapter.edit');
Route::patch('/stories/chapter/{id}', 'ChapterController@update')->name('chapter.update');
Route::delete('/stories/chapter/{id}', 'ChapterController@destroy')->name('chapter.destroy');

// Friendship
Route::get('/check_relationship_status/{id}', 'FriendshipController@check')->name('check');
Route::get('/add_friend/{id}', 'FriendshipController@add_friend')->name('add_friend');
Route::get('/accept_friend/{id}', 'FriendshipController@accept_friend')->name('accept_friend');

// feed
Route::get('/feed', 'FeedsController@feed')->name('feed');

//Categories
Route::get('/stories/categories/{category}', 'CategoryController@index')->name('categories');

// Comments
Route::post('/stories/{id}/comment', 'CommentController@store')->name('stories.comment');