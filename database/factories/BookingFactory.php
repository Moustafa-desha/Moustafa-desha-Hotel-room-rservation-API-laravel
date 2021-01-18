<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_start' =>$this->faker->date(),
            'date_end' =>$this->faker->date(),
            'booking_number' =>  rand(111111,999999) ,
            'room_id' =>$this->faker->numberBetween($min = 1, $max = 9),
            'user_id' =>1,
        ];
    }
}
