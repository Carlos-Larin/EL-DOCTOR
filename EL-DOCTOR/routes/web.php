<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});



// Ruta para procesar el login

Route::post('/login', [LoginController::class, 'login']);