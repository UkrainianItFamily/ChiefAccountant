<?php

namespace Database\Factories;

use App\Models\Help;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HelpFactory extends Factory
{
    protected $model = Help::class;

    public function definition()
    {
        $title = $this->faker->unique()->sentence(2);
        $slug = Str::slug($title, '-');

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(10),
            'category_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
