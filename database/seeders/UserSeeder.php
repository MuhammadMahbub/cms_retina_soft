<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'image' => 'backend/assets/images/default.jpg',
            'role' => 1,
            'isban' => 1,
            'email' => "admin@gmail.com",
            'password' => Hash::make('admin@gmail.com'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => "customer",
            'image' => 'backend/assets/images/default.jpg',
            'role' => 2,
            'isban' => 1,
            'email' => "customer@gmail.com",
            'password' => Hash::make('customer@gmail.com'),
            'created_at' => Carbon::now(),
        ]);
        DB::table('clients')->insert([
            'user_id' => 2,
            'phone' => 1234,
            'created_at' => Carbon::now(),
        ]);
    }
}
