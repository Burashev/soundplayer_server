<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\AuthorController;

Route::prefix('/song')->group(function () {
    Route::post('/create', [SongController::class, 'createPost']);
    Route::get('/{song:id}', [SongController::class, 'showGet']);
    Route::get('/{song:id}/source', [SongController::class, 'sourceGet'])->name('song.source');
    Route::post('/all', [SongController::class, 'allSongsGet']);
});

Route::prefix('/author')->group(function () {
    Route::post('/create', [AuthorController::class, 'createPost']);
    Route::get('/{author:id}', [AuthorController::class, 'showGet']);
});
