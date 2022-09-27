<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'id'         => $this->id,
            'user_id'    => $this->user_id,
            'vehicle_id' => $this->vehicle_id,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'from_location' => json_decode($this->from_location, true),
            'to_location' => json_decode($this->to_location, true),
            'grand_total' => $this->grand_total,
            'created_at' => $this->created_at,
            'note' => $this->note,
        ];
    }
}
