<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Config;
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

Route::get('/service', function () {
    return view('service');
});

Route::post('/contatos', [ContatoController::class, 'store'])
    ->name('contatos.store')
    ->middleware('throttle:3,1');

Route::get('/contatos/create', [ContatoController::class, 'create'])->name('contatos.create');

Route::middleware('auth')->group(function () {
    Route::resource('contatos', ContatoController::class)
        ->only(['index', 'show', 'edit', 'update', 'destroy']);
});

// Login route required for auth middleware redirection
Route::get('/login', function () {
    return redirect('/');
})->name('login');

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
