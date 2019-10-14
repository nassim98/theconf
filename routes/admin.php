<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
    $params = [
        'aut'=> Auth::user()->name,
    ];
    //dd($users);

    return view('admin.home')->with($params);
})->name('home');

