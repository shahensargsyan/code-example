<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class PostSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "mixed",
        'slug' => "mixed",
        'title' => "mixed",
        'body' => "string",
        'image' => "string",
        'published_at' => "date",
        ])]
    final public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
            'published_at' => $this->published_at,
        ];
    }
}
