<?php

namespace App\Http\Resources;

use App\Http\Resources\BookingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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

                'Id' => $this->id,
                'Name' => $this->name,
               // 'Description' => $this->disc,
                'Price per Night' => $this->price,
               // 'Image' => $this->img,

               //we use bookingResource to get data from ths rsoure and show with room information
                'Booking_info' => BookingResource::collection($this->bookings),

        ];
    }
}
