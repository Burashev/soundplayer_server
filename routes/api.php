<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\AuthorController;

Route::post('/song/create', [SongController::class, 'createPost']);
Route::get('/song/{song:id}', [SongController::class, 'showGet']);
Route::get('/song/{song:id}/source', [SongController::class, 'sourceGet']);
Route::post('/author/create', [AuthorController::class, 'createPost']);
Route::get('/author/{author:id}', [AuthorController::class, 'showGet']);
