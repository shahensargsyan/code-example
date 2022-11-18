<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryWithPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    final public function toArray($request): array
    {
        $post = [];
        if($this->lastPost->isNotEmpty()) {
            $lastPost = $this->lastPost->first();
            $post = [
                'id' => $lastPost->id,
                'title' => $lastPost->title,
                'image' => $lastPost->image,
                'slug' => $lastPost->slug,
                'image_alt' => $lastPost->image_alt,
                'published_at' => $lastPost->published_at,
                'views_count' => $lastPost->views_count??0,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'post' => $post
        ];
    }
}
