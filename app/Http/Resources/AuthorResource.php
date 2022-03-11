<?php

namespace App\Http\Resources;

use App\Models\Playlist;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $liked = Playlist::query()->make([
            'id' => now()->timestamp,
            'title' => 'Songs',
            'songs' => $this->songs
        ]);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'authorSongs' => $liked
        ];
    }
}
