<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CartItemSeeder::class,
            ItemSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            GovernorateSeeder::class,
            CollectionSeeder::class,
            ProfileSeeder::class,
        ]);
    }
}
