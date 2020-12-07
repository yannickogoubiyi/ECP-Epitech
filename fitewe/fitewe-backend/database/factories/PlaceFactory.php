<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Place::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'place_name' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'place_description' => $this->faker->text($maxNbChars = 250),
            'place_address' => $this->faker->streetAddress(),
            'place_location' => $this->faker->postcode(),
            'type_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'added_by' => $this->faker->numberBetween($min = 1, $max = 20),
            'likes_count' => $this->faker->numberBetween($min = 0, $max = 7),
            'dislikes_count' => $this->faker->numberBetween($min = 0, $max = 3),
            'dest_id' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
