<?php

namespace Database\Factories;

use App\Models\Published;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PublishedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Published::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->unique()->paragraph(2),
            'link' => $this->faker->url,
            'date' => $this->faker->date(),
        ];
    }
}
