<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Department extends Resource
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
            'name' => $this->name,
            'company' => new Company($this->whenLoaded('company')),
            'location' => new Location($this->whenLoaded('location')),
            'job-titles' => JobTitle::collection($this->whenLoaded('jobTitles')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
