<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JobTitle extends Resource
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
            'about' => $this->about,
            'is_dept_head' => $this->is_dept_head,
            // 'company' => new Company($this->whenLoaded('company')),
            // 'location' => new Location($this->whenLoaded('location')),
            // 'department' => new Department($this->whenLoaded('department')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
