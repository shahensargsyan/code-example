<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'id'   => $this['id'],
            'slug' => $this['slug'],
            'title' => $this['title'],
            'position' => $this['position'],
            'desktop_image' => $this['desktop_image'],
            'mobile_image' => $this['mobile_image'],
        ];
    }
}
