<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
                'room_id' => $this->room_id,
                'booking_number' =>$this->booking_number,
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
        ];
    }
}
