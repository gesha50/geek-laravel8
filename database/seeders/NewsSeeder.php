<?php

namespace Database\Seeders;

use App\Models\News;
use Database\Factories\NewsFactory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       News::factory()->count(50)->create();
    }
}
