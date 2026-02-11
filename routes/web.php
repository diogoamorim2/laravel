<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Mail;

// Root index group
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/index', 'index');
    Route::get('/about', 'about');
    Route::get('/contact', 'contact');
    Route::get('/industries', 'industries');
    Route::get('/service', 'service');
});

Route::post('/contatos', [ContatoController::class, 'store'])
    ->name('contatos.store')
    ->middleware('throttle:3,1');

Route::resource('contatos', ContatoController::class)
    ->except(['store']);

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
