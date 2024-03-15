<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiniTwitterController;

Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');


Route::post(
    '/receive',
    [MiniTwitterController::class, 'receiveData']
);
