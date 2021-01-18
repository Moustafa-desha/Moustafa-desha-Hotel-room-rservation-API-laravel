<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'booking_number',
        'date_start',
        'date_end'
    ];
        public function room(){

            return   $this->belongsTo(Room::class,'room_id');
        }

        public function user(){

            return  $this->belongsTo (User::class,'user_id');
        }

        // mutator 
        /*
        public public SetBookingNumberAttruibute($q){
            $this->booking_number =  rand(111111,9999999)
        }
        */
         

}
