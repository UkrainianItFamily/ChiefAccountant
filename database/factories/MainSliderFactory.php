<?php

namespace Database\Factories;

use App\Models\MainSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(6),
            'link' => '#',
            'description' => $this->faker->paragraph(4),
            'position' => $this->faker->unique()->randomNumber(1),
        ];
    }
}
