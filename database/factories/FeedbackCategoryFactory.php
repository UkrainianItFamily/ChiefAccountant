<?php

namespace Database\Factories;

use App\Models\FeedbackCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedbackCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $title = $this->faker->unique()->sentence(6);

        return [
            'title' => $title,
        ];
    }

}
