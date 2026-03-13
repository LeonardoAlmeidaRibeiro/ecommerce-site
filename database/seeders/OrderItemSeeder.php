<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderItem::create(['order_id' => '1', 'product_id' => '1.', 'price' => '38.80',  'quantity' => '2']);
        OrderItem::create(['order_id' => '1', 'product_id' => '3.', 'price' => '1200.50',  'quantity' => '1']);
        OrderItem::create(['order_id' => '2', 'product_id' => '3.', 'price' => '1200.50',  'quantity' => '1']);
        OrderItem::create(['order_id' => '3', 'product_id' => '2.', 'price' => '19.90',  'quantity' => '1']);
    }
}
