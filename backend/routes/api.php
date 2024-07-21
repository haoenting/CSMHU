<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);




//Route::post('/insert', [DataController::class, 'insert'])->middleware('api');
Route::post('/test', [DataController::class, 'test']);

