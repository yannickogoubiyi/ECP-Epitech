<?php

namespace Database\Factories;

use App\Models\SuggestedPlaceImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuggestedPlaceImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuggestedPlaceImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sugg_id' => $this->faker->numberBetween($min = 1, $max = 8),
            'pics' => $this->faker->imageUrl($width, $height, 'cats', true, 'Faker'),
        ];
    }
}
