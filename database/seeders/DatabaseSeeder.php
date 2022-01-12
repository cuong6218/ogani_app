<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory()->count(10)->create();
        \App\Models\Food::factory()->count(100)->create();
        \App\Models\User::factory()->count(1)->create();
    }
}
