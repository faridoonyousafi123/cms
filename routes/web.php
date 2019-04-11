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

Route::get('/category/create', [

    'uses' => 'CategoriesController@create',
    'as' => 'category.create'

]);


Route::post('category/store', [

    'uses' => 'CategoriesController@store',
    'as' => 'category.store'

]);


Route::get('categories', [

    'uses' => 'CategoriesController@index',
    'as' => 'categories'
]);


Route::get('category/edit/{id}', [

    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'

]);


Route::post('category/update/{id}', [

    'uses' => 'CategoriesController@update',
    'as' => 'category.update'

]);


Route::post('category/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete'
]);


Route::resource('posts', 'PostsController');
Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
Route::put('restore-post/{id}', 'PostsController@restore')->name('restore-post');

