<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('reviewer')->user();

    //dd($users);

    return view('reviewer.home');
})->name('home');

