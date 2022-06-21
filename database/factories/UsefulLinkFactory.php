<?php

namespace Database\Factories;

use App\Models\UsefulLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsefulLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsefulLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->text(20),
            'link' => $this->faker->url,
        ];
    }
}
