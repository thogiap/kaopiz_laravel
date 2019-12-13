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
//Route::get('/insert_posts', 'PostController@insert_posts');
Route::get('/get_posts', 'PostController@get_posts')->name('get_posts');
Route::get('/delete_posts/{id}', 'PostController@delete_posts')->name('delete_posts');
Route::get('/update_post/{id}', 'PostController@get_view_update_post')->name('update_post');
Route::post('/update_post/{id}', 'PostController@update_post');
Route::get('/create_posts', 'PostController@create_posts')->name('create_posts');
Route::post('/create_posts', 'PostController@insert_posts');

Route::get('/search', 'PostController@get_view_search')->name('search');
Route::post('/search', 'PostController@search');

