<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;


/**
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $quiz_image
 */
class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape([
        'id' => "int",
        'slug' => "string",
        'title' => "string",
        'quiz_image' => "string"])]
    final public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'quiz_image' => $this->quiz_image
        ];
    }
}
