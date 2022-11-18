<?php

namespace App\Http\Resources;

use \App\Http\Resources\TagResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    #[ArrayShape([
        'id' => "mixed",
        'title' => "mixed",
        'slug' => "mixed",
        'author' => "mixed",
    ])]
    final public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'image' => $this->image,
            'short_description' => $this->short_description,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'views_count' => $this->views_count,
            'image_alt' => $this->image_alt,
            'published_at' =>Carbon::parse($this->published_at)->format('Y-m-d H:i:s'),
            'author' => (isset($this->author->name) && $this->show_author_name)?$this->author->name:'',
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'category' => [
                'id'   => $this->categories->last()->id,
                'slug' => $this->categories->last()->slug,
                'name' => $this->categories->last()->name,
                'children' => $this->categories->last()->children,
                'is_type' =>  $this->categories->last()->is_type,
                'open_type' =>  $this->categories->last()->open_type,
                'show_in_menu' =>  $this->categories->last()->show_in_menu,
                'is_group' =>  $this->categories->last()->is_group,
                'is_main' =>  $this->categories->last()->is_main,
            ],
            'tags' => TagResource::collection($this->tags),
            'show_thumbnail_in_body' => $this->show_thumbnail_in_body,
            'exclusive' => $this->exclusive,
            'breaking' => $this->breaking,
            'official' => $this->official,
            'og_title' => $this->og_title,
            'og_image' => $this->og_image,
            'total' => (isset($this->total)?$this->total():null),
        ];
    }
}
