<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryItemResource extends JsonResource
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
            'image_alt' => $this->image_alt,
            'image' => $this->image,
            'type' => $this->type,
            'video_url' => $this->video_url,
            'is_main' => $this->is_main,
            'gallery_id' => $this->gallery_id,
        ];
    }
}
