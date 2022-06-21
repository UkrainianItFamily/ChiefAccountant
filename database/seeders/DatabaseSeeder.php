<?php

namespace Database\Seeders;

use App\Models\Help;
use App\Models\MainSlider;
use App\Models\News;
use App\Models\Published;
use App\Models\Tag;
use App\Models\UsefulLink;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(20)->create();
        News::factory(100)->create();
        Published::factory(100)->create();
        UsefulLink::factory(30)->create();
        MainSlider::factory(5)->create();

        $this->call(NewsTagSeeder::class);
        $this->call(CurrencyRateSeeder::class);
        $this->call(ReportsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(HelpCategoriesSeeder::class);
        $this->call(FeedbackCategorySeeder::class);
        $this->call(FeedbackInfoSeeder::class);

        Help::factory(10)->create();
    }
}
