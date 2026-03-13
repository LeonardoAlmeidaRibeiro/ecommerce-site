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
        Product::create(['name' => 'Mouse Gamer', 'description' => 'Mouse RGB 7200 DPI.', 'price' => '19.90',  'img_url' => 'assets/images/mouse.jpg']);
        Product::create(['name' => 'Teclado Gamer', 'description' => 'Teclado mecânico.', 'price' => '39.90',  'img_url' => 'assets/images/teclado.jpg']);
        Product::create(['name' => 'Computador Gamer', 'description' => 'Computador Xtreme Turbo.', 'price' => '1200.50',  'img_url' => 'assets/images/pc_gamer.png']);
        Product::create(['name' => 'Monitor Gamer', 'description' => 'Monitor Tela 21 P - 4K.', 'price' => '560.00',  'img_url' => 'assets/images/monitor.png']);
    }
}
