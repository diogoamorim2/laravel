<?php

use Illuminate\Support\Facades\Route;

// Root index group
Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/industries', function () {
    return view('industries');
});

Route::get('/outros', function () {
    return view('outros');
});

Route::get('/service', function () {
    return view('service');
});