<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//auteur

Route::get('/auteurHome', 'AuteurController@auteurHome')->name('auteurHome');
Route::any('/auteurUpload', 'AuteurController@auteurUpload')->name('auteurUpload');
Route::any('/auteurAdd', 'AuteurController@auteurAdd')->name('auteurAdd');
Route::get('/loginHome', function (){
    return view('loginHome');
})->name('loginHome');

//reviseur
Route::get('/reviseurForm', 'ReviseurController@reviseurForm')->name('reviseurForm');
Route::get('/reviseurHome', 'ReviseurController@reviseurHome')->name('reviseurHome');


Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::any('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::resource('reviewers', 'Admin\ReviewersController');
  Route::resource('authors', 'Admin\AuthorsController');
  Route::resource('conferences', 'Admin\ConferencesController');
});

Route::group(['prefix' => 'author' ], function () {
  Route::get('/login', 'AuthorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AuthorAuth\LoginController@login');
  Route::post('/logout', 'AuthorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AuthorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AuthorAuth\RegisterController@register');

  Route::post('/password/email', 'AuthorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AuthorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AuthorAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AuthorAuth\ResetPasswordController@showResetForm');


    Route::resource('conferencess', 'Author\ConferencesController');
});

Route::group(['prefix' => 'reviewer'], function () {
  Route::get('/login', 'ReviewerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'ReviewerAuth\LoginController@login');
  Route::post('/logout', 'ReviewerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'ReviewerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'ReviewerAuth\RegisterController@register');

  Route::post('/password/email', 'ReviewerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'ReviewerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'ReviewerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'ReviewerAuth\ResetPasswordController@showResetForm');


  Route::resource('conference', 'Reviewer\ConferencesController');
  Route::resource('reviews', 'Reviewer\ReviewsController');
});
