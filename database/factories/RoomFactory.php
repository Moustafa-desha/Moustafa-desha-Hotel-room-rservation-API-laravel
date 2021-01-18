<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        static $i = 0 ;
        $i++;
        return [
            'hotel_id' =>$this->faker->numberBetween($min = 1, $max = 7),
            'name' => $this->faker->word(),
            'desc' => $this->faker->text(500),
            'price' => $this->faker->numberBetween($min = 100, $max = 600),
            'img' => "uploads/$i.png",
        ];
    }
}
