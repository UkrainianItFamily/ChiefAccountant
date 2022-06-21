<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelpCategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('help_categories')->insert([
            [
                'title' => 'Общая информация',
                'slug' => 'obshaya-informaciya',
            ],
            [
                'title' => 'Поиск в базе данных',
                'slug' => 'poisk-v-baze-dannyh',
            ],
        ]);
    }
}
