<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\WelcomeController@index');
// Route::get('backtohome', 'App\Http\Controllers\DashboardController@backToHome');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/categories', 'App\Http\Controllers\CategoriesController');

    Route::resource('/tags', 'App\Http\Controllers\TagsController');

    Route::resource('/posts', 'App\Http\Controllers\PostsController');

    Route::get('/trashed-posts', 'App\Http\Controllers\PostsController@trashed')->name('trashed.index');

    Route::get('/trashed-posts/{id}', 'App\Http\Controllers\PostsController@restore')->name('trashed.restore');
});

// Route::middleware(['auth', 'admin']->group function() {
//     Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
//     Route::get('/users/create', 'App\Http\Controllers\UsersController@create')->name('users.create');
// });
// Route::group(['middleware' => 'auth', 'admin'], function() {
//     Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
//     Route::get('/users/create', 'App\Http\Controllers\UsersController@create')->name('users.create');
// });

// Route::group(['auth'], function() {
//     Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
//     Route::get('/users/create', 'App\Http\Controllers\UsersController@create')->name('users.create');
// });

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
    Route::post('/users/{user}/make-admin', 'App\Http\Controllers\UsersController@makeAdmin')->name('users.make-admin');
    Route::post('/users/{user}/remove-admin', 'App\Http\Controllers\UsersController@removeAdmin')->name('users.remove-admin');
});
Route::middleware(['auth'])->group(function() {
    Route::get('/users/{user}/profile', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::post('/users/{user}/profile', 'App\Http\Controllers\UsersController@update')->name('users.update');
});
