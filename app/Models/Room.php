<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'img',
        
    ];


    public function hotel(){

        return  $this->belongsTo(Hotel::class);
    }

    public function bookings(){
        return   $this->hasMany(Booking::class);
    }
}
