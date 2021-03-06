<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\PlaylistController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\AuthApi;

Route::prefix('/song')->group(function () {
    Route::post('/create', [SongController::class, 'createPost']);
    Route::get('/{song:id}', [SongController::class, 'showGet']);
    Route::get('/{song:id}/source', [SongController::class, 'sourceGet'])->name('song.source');
    Route::post('/all', [SongController::class, 'allSongsGet']);

    Route::middleware(AuthApi::class)->group(function () {
        Route::get('/{song:id}/like', [SongController::class, 'likeSongGet']);
        Route::get('/{song:id}/unlike', [SongController::class, 'unlikeSongGet']);
    });
});

Route::prefix('/author')->group(function () {
    Route::post('/create', [AuthorController::class, 'createPost']);
    Route::get('/{author:id}', [AuthorController::class, 'showGet']);
});

Route::prefix('/playlists')->group(function () {
    Route::get('/main', [PlaylistController::class, 'mainPlaylistsGet']);
    Route::post('/create', [PlaylistController::class, 'createPost']);
    Route::post('/{playlist:id}/add/song', [PlaylistController::class, 'addSongPost']);
});

Route::prefix('/auth')->group(function () {
    Route::get('/redirect/github', [AuthController::class, 'redirectGithub']);
    Route::get('/callback/github', [AuthController::class, 'callbackGithub']);
});

Route::middleware(AuthApi::class)->prefix('/user')->group(function () {
    Route::get('/me', [UserController::class, 'meGet']);
});
