<?php

 View::share('blog',App\Blog::all()); 
 View::share('user',App\User::all()); 
 View::share('categories',App\Category::latest()->get()); 




// //testing mailgun


// use Illuminate\Support\Facades\Mail; 



//  Route::get('mail',function(){

//   $data = [
    
//     'title' => 'This is Mail Title  --New Larablog',
//     'content'=>'This is Mail Content --New Larablog',
   
//   ];


//   Mail::send('emails.test',$data,function($message){

//   	$message->to('parvez@larablog.com','Parvez')->subject('Hello and welcome to the amazing larablog course tutorial');



//   });

//  });





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

Route::get('contact','MailController@contact');
Route::post('contact/send','MailController@send');
Route::get('/{username?}',array('as' =>'show','uses' => 'UserController@show' ));




