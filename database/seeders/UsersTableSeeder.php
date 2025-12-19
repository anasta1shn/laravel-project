<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
           [
               'username' => 'Тестовый Администратор',
               'email' => 'admin@admin.ru',
               'password' => bcrypt('password'),
               'address' => null,
               'phone_number' => null,
               'role_id' => 1
           ],
            [
                'username' => 'Тестовый Пользователь',
                'email' => 'user@user.ru',
                'password' => bcrypt('password'),
                'address' => 'г. Екатеринбург, ул. Заводская, д. 38, кв. 666',
                'phone_number' => '79057293144',
                'role_id' => 2
            ],
        ]);
    }
}
