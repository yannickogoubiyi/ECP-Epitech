<?php

namespace Database\Factories;

use App\Models\PlaceImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlaceImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'place_id' => $this->faker->numberBetween($min = 1, $max = 60),
            'pics' => $this->faker->imageUrl($width, $height, 'cats', true, 'Faker'),
        ];
    }
}
