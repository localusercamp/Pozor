<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'posters' => ImageResource::collection($this->posters),
            'galleries' => ImageResource::collection($this->galleries),
            'status' => new StatusResource($this->status),
            'author' => new UserResource($this->author),
            'approver' => $this->when($this->approver != null, new UserResource($this->approver)),
            'genres' => GenreMovieResource::collection($this->genres),
            'created_at' => $this->created_at,
        ];
    }
}
