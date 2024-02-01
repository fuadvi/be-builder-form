<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'title' => $this->title,
            'description' => $this->description,
            'background' => $this->background,
            'updated_at' => $this->updated_at,
            'fields' => $this->whenLoaded('fields',function (){
                return $this?->fields?->component;
            }),
            'answer' => $this->whenLoaded('answers',function (){
                return $this?->answers;
            }),
        ];
    }
}
