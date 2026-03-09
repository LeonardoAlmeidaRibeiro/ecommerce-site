<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Mouse Gamer', 'description' => 'Mouse RGB 7200 DPI.', 'price' => '199.90',  'img_url' => 'assets/images/mouse.jpg']);
        Product::create(['name' => 'Teclado Gamer', 'description' => 'Teclado mecânico.', 'price' => '399.90',  'img_url' => 'assets/images/teclado.jpg']);
    }
}
