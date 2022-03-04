<?php

namespace App\Http\Resources;

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
        return [
            'avatar' => $this->avatar,
            'email' => $this->email,
            'nickname' => $this->nickname,
            'token' => $this->token,
            'likedSongs' => SongResource::collection($this->likedSongs),
            'updated_at' => $this->updated_at,
        ];
    }
}
