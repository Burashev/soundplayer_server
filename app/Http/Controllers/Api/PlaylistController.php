<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\PlaylistResource;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends BaseController
{
    public function mainPlaylistsGet()
    {
        $playlists = Playlist::query()->where('on_main', true)->get();
        return $this->sendResponse('', PlaylistResource::collection($playlists));
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'on_main' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 401);
        }

        $playlist = Playlist::query()->create([
           'title' => $request->input('title'),
           'on_main' => $request->input('on_main'),
        ]);

        return $this->sendResponse('Playlist created!', new PlaylistResource($playlist));
    }
}
