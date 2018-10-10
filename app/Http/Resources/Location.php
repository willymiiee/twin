<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Location extends Resource
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
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'timezone' => $this->timezone,
            'currency' => $this->currency,
            'company' => new Company($this->whenLoaded('company')),
            'departments' => Department::collection($this->whenLoaded('departments')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
