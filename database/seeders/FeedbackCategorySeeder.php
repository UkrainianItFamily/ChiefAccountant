<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback_categories')->insert([
            [
                'title' => 'Отдел продаж',
                'parent_category_id' => null,
            ],
            [
                'title' => 'Техническая поддержка',
                'parent_category_id' => null,
            ],
            [
                'title' => 'Проблема с лицензией',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Продление лицензии',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Как оплатить?',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Запрос специальных условий',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Подобрать документы по теме',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Свой вопрос (комментарий)',
                'parent_category_id' => 1,
            ],
            [
                'title' => 'Не могу найти документ',
                'parent_category_id' => 2,
            ],
            [
                'title' => 'Система не принимает мой пароль',
                'parent_category_id' => 2,
            ],
            [
                'title' => 'Я забыл пароль что делать?',
                'parent_category_id' => 2,
            ],
            [
                'title' => 'Ошибка в базе данных!',
                'parent_category_id' => 2,
            ],
            [
                'title' => 'Свой вопрос (комментарий)',
                'parent_category_id' => 2,
            ],
        ]);
    }
}
