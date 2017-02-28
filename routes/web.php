<?php

 View::share('blog',App\Blog::all()); 
 View::share('categories',App\Category::latest()->get()); 










Route::get('/blog/bin', 'BlogController@bin');
Route::get('/blog/bin/{id}', 'BlogController@restore');
Route::delete('/blog/bin/{id}/destroyblog', 'BlogController@destroyblog');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/blog', 'BlogController@index');
Route::get('/blog/create', 'BlogController@create');
Route::post('/blog/store', 'BlogController@store');
Route::get('/blog/{slug}', 'BlogController@show');
Route::get('/blog/{id}/edit', 'BlogController@edit');
Route::patch('/blog/{id}', 'BlogController@publish');
Route::patch('/blog/{id}', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@destroy');
Route::get('admin', 'AdminController@index');
Route::resource('categories', 'CategoryController');
Route::resource('media', 'PhotosController');
Route::get('userslist', 'UserController@userslist');
Route::resource('users', 'UserController');




