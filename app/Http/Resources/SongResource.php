<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use wapmorgan\Mp3Info\Mp3Info;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @throws \Exception
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'durationSeconds' => $this->duration,
            'author' => AuthorResource::make($this->author),
            'source' => route('song.source', ['song' => $this->id]),
            // TODO: make not dummy cover
            'cover' => 'https://avatars.yandex.net/get-music-content/5314916/e4991ab5.a.19028663-1/150x150'
        ];
    }
}
