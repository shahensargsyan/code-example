<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PollQuestionResource extends JsonResource
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
            "id" => $this->id,
            "poll_id" => $this->poll_id,
            "name" => $this->name,
            "percentage" => $this->percentage,
            "icon_class_name" => $this->icon_class_name,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,

        ];
    }
}
