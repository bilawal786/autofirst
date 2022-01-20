<?php

namespace App\Http\Resources;

use App\Season;
use App\SeasonCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $check = SeasonCategory::where('category_id', $this->categorie->id)->first();
        $season = Season::find($check->season_id);
        return [
            'price' => $season->price,
            'vehicle_marque' => $this->marque->name,
            'vehicle_number' => $this->registration,
            'vehicle_modal' => $this->modal->name,
            'vehicle_image' => $this->image,
        ];
    }
}
