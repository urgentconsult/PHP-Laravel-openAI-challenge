<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('chatbot');
});

Route::post('/chatbot', [ChatbotController::class, 'generateResponse']);