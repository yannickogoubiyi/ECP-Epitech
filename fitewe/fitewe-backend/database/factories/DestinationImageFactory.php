<?php

namespace Database\Factories;

use App\Models\DestinationImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DestinationImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dest_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'pics' => $this->faker->imageUrl($width, $height, 'cats', true, 'Faker'),
        ];
    }
}
