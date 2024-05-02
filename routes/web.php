<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
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


//Controller 
Route::get('/user/{id}', [UserController::class, 'show']);

//cadastrar email subscribe-email - newsletter
/*Route::resource('newslatter', ContatoController::class)->only([
    'index', 'show' , 'store'
]);*/

Route::resource('contatos', ContatoController::class);
