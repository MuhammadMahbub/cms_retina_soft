<?php

namespace Database\Seeders;

use App\Models\Balance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            'client_id' => 2,
            'income' => 100,
            'expense' => 50,
            'created_at' => '2023-11-04'
        ]);
        Balance::create([
            'client_id' => 2,
            'income' => 100,
            'expense' => 50,
            'created_at' => '2023-08-04'
        ]);
        Balance::create([
            'client_id' => 2,
            'income' => 100,
            'expense' => 100,
            'created_at' => '2023-08-04'
        ]);
        Balance::create([
            'client_id' => 2,
            'income' => 100,
            'expense' => 50,
            'created_at' => '2023-06-04'
        ]);
        Balance::create([
            'client_id' => 2,
            'income' => 100,
            'expense' => 150,
            'created_at' => '2023-04-04'
        ]);
    }
}
