<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeasonResource extends JsonResource
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
            'vehicle_id' => $this->vehicle->id,
            'price' => $this->price,
            'vehicle_marque' => $this->vehicle->marque->name,
            'vehicle_number' => $this->vehicle->registration,
            'vehicle_modal' => $this->vehicle->modal->name,
            'vehicle_image' => $this->vehicle->image,
        ];
    }
}
