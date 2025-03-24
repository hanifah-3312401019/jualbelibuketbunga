<?php

use Illuminate\Support\Facades\Route;
use illuminate\http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/signup', function () {
    return view('signup'); // Pastikan ada file resources/views/signup.blade.php
});

Route::post('/signup', function (Request $request) {
    return back()->with('success', 'Sign up successful! (This is a dummy action)');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/history_order', function () {
    return view('history_order');
})->name('history.order'); 
