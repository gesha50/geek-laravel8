<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
//use DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $faker = Faker::create();
        $data = [];
//        $maxCategoryId = '';
        for ($i=0;$i<10;$i++){
            $data[] = [
                'category_id' => rand(1,5),   // rand(1, $maxCategoryId),
                'image' => 'http://dummyimage.com/250',
                'is_private' => rand(0,1),
                'title' => $faker->sentence(rand(3,5)),
                'spoiler' => $faker->text(rand(200,220)),
                'description' => $faker->text(rand(1000,2000))
            ];
        }
        return $data;
    }
}
