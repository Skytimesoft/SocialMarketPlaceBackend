<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'logo' => isset($this->logo) ? 'storage/' . $this->logo : null,
            'sub-categories' => SubCategoryResource::collection($this->whenLoaded('childs')),
        ];
    }
}