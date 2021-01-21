<?php

namespace App\Http\Resources;

use App\Models\Tags;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'priority_id' => $this->priority_id,
            'deadline' => $this->deadline,
            'tags' => TagsResource::collection($this->tags),
            'executed' => $this->executed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
