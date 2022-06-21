<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Админ',
                'surname' => 'Админ',
                'email' => '19FrEshAdmin@glavbuh.com',
                'login' => 'admin',
                'password' => Hash::make('Password'),
                'is_admin' => '1',
            ],
        ]);
    }
}
