<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency_rates')->insert([
            [
                'date' => '2020-12-14',
                'usd_rate' => '19.05',
                'eur_rate' => '18.05',
                'rub_rate' => '17.05',
            ],
            [
                'date' => '2021-01-14',
                'usd_rate' => '19.05',
                'eur_rate' => '18.05',
                'rub_rate' => '17.05',
            ],
            [
                'date' => '2021-02-15',
                'usd_rate' => '19.05',
                'eur_rate' => '65.05',
                'rub_rate' => '55.05',
            ],
            [
                'date' => '2021-03-17',
                'usd_rate' => '19.05',
                'eur_rate' => '65.05',
                'rub_rate' => '17.05',
            ],
            [
                'date' => '2021-04-05',
                'usd_rate' => '55.05',
                'eur_rate' => '65.05',
                'rub_rate' => '17.05',
            ],
            [
                'date' => '2021-05-06',
                'usd_rate' => '19.05',
                'eur_rate' => '55.05',
                'rub_rate' => '65.05',
            ],
            [
                'date' => '2021-06-07',
                'usd_rate' => '55.05',
                'eur_rate' => '65.05',
                'rub_rate' => '17.05',
            ],
            [
                'date' => '2021-07-08',
                'usd_rate' => '19.05',
                'eur_rate' => '18.05',
                'rub_rate' => '55.05',
            ],
            [
                'date' => '2021-08-01',
                'usd_rate' => '65.05',
                'eur_rate' => '55.05',
                'rub_rate' => '17.05',
            ],
        ]);
    }
}
