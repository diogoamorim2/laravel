<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Mail;

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

/*Route::get('/outros', function () {
    return view('outros');
});*/

Route::get('/service', function () {
    return view('service');
});


//Controller 
Route::get('/user/{id}', [UserController::class, 'show']);

Route::resource('contatos', ContatoController::class);

// Test email sending with a route
/*
    Route::get('/mailable', function () {
        $contato = App\Models\Contato::find(1); 
        return new App\Mail\Newsletter($contato);
    });
*/