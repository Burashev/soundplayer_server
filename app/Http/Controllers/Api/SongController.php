<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SongController extends BaseController
{
    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'file' => 'file|mimes:mp3,wav|required',
            'author_id' => 'required|exists:authors,id'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 401);
        }

        $name = Str::random() . '.' . $request->file('file')->extension();
        $request->file('file')->move(public_path() . '/songs/', $name);

        $song = Song::query()->create([
            'title' => $request->input('title'),
            'author_id' => $request->input('author_id'),
            'source' => $name,
        ]);

        return $this->sendResponse('Song created!', new SongResource($song));
    }

    public function showGet(Song $song, Request $request)
    {
        return $this->sendResponse('', new SongResource($song));
    }

    public function sourceGet(Song $song)
    {
        $path = public_path() . '/songs/' . $song->source;

        return response()->file($path);
    }

    public function allSongsGet() {
        $songs = Song::all();
        return $this->sendResponse('', SongResource::collection($songs));
    }
}
