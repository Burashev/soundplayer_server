<?php

namespace App\Http\Resources;

use App\Models\Playlist;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $liked = Playlist::query()->make([
            'id' => now()->timestamp,
            'title' => 'Your liked songs',
            'songs' => $this->likedSongs
        ]);
        return [
            'avatar' => $this->avatar,
            'email' => $this->email,
            'nickname' => $this->nickname,
            'token' => $this->token,
            'likedSongs' => PlaylistResource::make($liked),
            'updated_at' => $this->updated_at,
        ];
    }
}
