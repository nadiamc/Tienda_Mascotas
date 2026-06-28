<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Pet::factory(50)->create();
    }
}