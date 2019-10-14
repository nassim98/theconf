<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('author')->user();

    //dd($users);

    return view('author.home');
})->name('home');

