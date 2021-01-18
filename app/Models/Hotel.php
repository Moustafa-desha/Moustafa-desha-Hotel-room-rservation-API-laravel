<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'desc',

        
    ];


    public function rooms(){

        return $this->hasMany(Room::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
