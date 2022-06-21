<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\ReportCategory;
use App\Models\ReportRedaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportsSeeder extends Seeder
{
    public function run()
    {
        DB::table('report_categories')->insert([
            [
                'name' => 'Нормативная база',
                'slug' => Str::slug('Нормативная база'),
                'report_category_id' => null,
            ],
            [
                'name' => 'Отчётность',
                'slug' => Str::slug('Отчётность'),
                'report_category_id' => null,
            ],
            [
                'name' => 'Налоговая система',
                'slug' => Str::slug('Налоговая система'),
                'report_category_id' => null,
            ],
            [
                'name' => 'Консультации и аналитика',
                'slug' => Str::slug('Консультации и аналитика'),
                'report_category_id' => null,
            ],
            [
                'name' => 'Формы и бланки',
                'slug' => Str::slug('Формы и бланки'),
                'report_category_id' => null,
            ],
            [
                'name' => 'Справочники',
                'slug' => Str::slug('Справочники'),
                'report_category_id' => null,
            ],
        ]);
        $categoriesOffset = 6;
        $categoriesLimit = 5;
        $reportsOffset = 0;
        $reportsLimit = 2;

        Report::factory(360)->create();
        ReportCategory::factory(180)->create();
        ReportRedaction::factory(450)->create();

        for ($i = 1; $i <= 6; $i++) {
            $categories = ReportCategory::offset($categoriesOffset)->limit($categoriesLimit)->get();

            foreach ($categories as $category) {
                $category->report_category_id = $i;
                $category->update();

                $reportsCollection = Report::offset($reportsOffset)->limit($reportsLimit)->get();
                $category->reports()->saveMany($reportsCollection);

                $reportsOffset += $reportsLimit;
                $categoriesOffset += $categoriesLimit;

                $subCategories = ReportCategory::offset($categoriesOffset)->limit($categoriesLimit)->get();

                foreach ($subCategories as $subCategory) {
                    $subCategory->report_category_id = $category->id;
                    $subCategory->update();

                    $reportsCollection = Report::offset($reportsOffset)->limit($reportsLimit)->get();
                    $subCategory->reports()->saveMany($reportsCollection);
                    $reportsOffset += $reportsLimit;
                }
            }

            $categoriesOffset += $categoriesLimit;
        }
    }
}
