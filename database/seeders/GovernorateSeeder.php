<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernorateSeeder extends Seeder
{
    public function run()
    {
        Governorate::factory()->count(10)->create();
    }
}
