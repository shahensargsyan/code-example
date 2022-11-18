<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    final public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'link' => $this->link,
            'background_image' => $this->background_image,
            'banner_image' => $this->banner_image,
            'banner_link' => $this->banner_link,
            'children' => $this->children,
        ];
    }
}
