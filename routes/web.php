<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
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

// Added login route for auth middleware
Route::get('/login', function () {
    return 'Login Page'; // Placeholder
})->name('login');

Route::get('/industries', function () {
    return view('industries');
});

Route::get('/service', function () {
    return view('service');
});

//Controller 
Route::get('/user/{id}', [UserController::class, 'show']);

Route::resource('contatos', ContatoController::class);


//View disabled
/*
    Route::get('/outros', function () {
        $apiKey = config('services.googlemaps.api_key'); // Using the configuration file
        return view('outros', ['apiKey' => $apiKey]);
    });
*/

// Test email sending with a route
/*
    Route::get('/mailable', function () {
        $contato = App\Models\Contato::find(1); 
        return new App\Mail\Newsletter($contato);
    });
*/
