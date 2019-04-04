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


Route::get('category/index', [

    'uses' => 'CategoriesController@index',
    'as' => 'categories.index'
]);


Route::get('category/edit/{id}', [

    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'

]);


Route::post('category/update/{id}', [

    'uses' => 'CategoriesController@update',
    'as' => 'category.update'

]);


Route::get('category/delete/{id}', [

    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete'
]);
