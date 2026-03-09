<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['id'=>1, 'name' => 'Maria Silva', 'cpf' => '12345678900', 'phone' => '61999999999',  'email' => 'maria@mail.com', 'birth_date' => '2000-11-01',  'password'  => bcrypt('teste')]);
        User::create(['id'=>2,'name' => 'Alex Ramos', 'cpf' => '12345678901', 'phone' => '61988888888',  'email' => 'alex@mail.com', 'birth_date' => '1990-11-01',  'password'  => bcrypt('teste')]);
    }
}
