<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Services\FedExService;
Route::get('/', function () {
    return view('mainpage.home');
});

// Route::get('/', [QuoteController::class, 'retrieveShipments'])->name('retrieveShipments');


// Route::post('/retriveShipments', [QuoteController::class, 'shipment'])->name('retrieveShipments');

// Route for displaying the form with countries (GET request)
Route::get('/', [QuoteController::class, 'retrieveShipments'])->name('retrieveCountries');

// Route for processing the form and retrieving shipments (POST request)
Route::get('/retrieve-shipments', [QuoteController::class, 'getToken'])->name('retrieveShipments');

