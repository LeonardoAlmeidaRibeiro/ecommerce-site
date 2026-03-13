<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create(['user_id' => '1', 'moment' => '2026-03-12 10:00:00', 'status' => '1']);
        Order::create(['user_id' => '2', 'moment' => '2026-03-12 21:21:21', 'status' => '2']);
        Order::create(['user_id' => '1', 'moment' => '2026-03-12 23:59:59', 'status' => '5']);
    }
}
