<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'fullname' => 'えにゃん',
            'email' => 'enyan27@gmail.com',
            'password' => Hash::make('123456'),
            'gender' => 0,
            'phonenumber' => NULL,
            'address' => '53 Vo Van Ngan, Linh Chieu, Thu Duc City, Ho Chi Minh City',
            'avatar' => 'storage/uploads/user/2024/03/14/avatar-enananuser-Fb30iZYaIAItbBf.jpg',
            'level' => 0,
            'remember_token' => NULL,
            'active' => 0,
            'country' => NULL,
            'postcode' => NULL,
            'created_at' => '2024-02-14 18:25:00',
            'updated_at' => '2024-04-22 16:54:28',
        ]);
    }
}

// php artisan db:seed --class=UsersTableSeeder