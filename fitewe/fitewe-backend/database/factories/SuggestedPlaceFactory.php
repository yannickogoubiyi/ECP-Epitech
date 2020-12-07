<?php

namespace Database\Factories;

use App\Models\SuggestedPlace;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestedPlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuggestedPlace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sugg_name' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'sugg_type_id' => $this->faker->numberBetween($min = 1, $max = 4),
            'sugg_address' => $this->faker->streetAddress(),
            'sugg_description' => $this->faker->text($maxNbChars = 250),
            'sugg_location' => $this->faker->postcode(),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
