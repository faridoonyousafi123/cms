<?php
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\WelcomeController;

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


Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/blog/category/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{tag}', [PostsController::class, 'tag'])->name('blog.tag');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Auth::routes();

Route::middleware(['auth'])->group(function() {
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
Route::resource('tags', 'TagsController');
});

Route::middleware(['auth', 'verifyAdmin'])->group(function () {
    Route::get('user/profile', 'UsersController@profile')->name('profile.index');
    Route::put('user/profile', 'UsersController@update')->name('profile.update');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});

