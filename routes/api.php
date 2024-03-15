<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiniTwitterController;

// Route::get("/test-me", function () {
//     return 'Hallo vom Laravel Backend!';
// });


// All Listitems

Route::get('/test-me', [MiniTwitterController::class, 'index']);


Route::post('/receive', [MiniTwitterController::class, 'receiveData']);


Route::post('/form', [MiniTwitterController::class, 'store']);
