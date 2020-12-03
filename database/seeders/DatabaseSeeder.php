<?php

namespace Database\Seeders;

use Database\Seeders\CategoriesSeeder;
use Database\Seeders\NewsSeeder;
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
        $this->call([
            NewsSeeder::class,
            CategoriesSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
