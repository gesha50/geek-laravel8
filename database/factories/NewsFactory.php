<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 5),   // rand(1, $maxCategoryId)
            'image' => "",
            'is_private' => rand(0, 1),
            'title' => $this->faker->sentence(rand(3, 5)),
            'spoiler' => $this->faker->text(rand(200, 220)),
            'description' => $this->faker->text(rand(1000, 2000))
        ];
    }
    public function withCategoryID()
    {
        return $this->state(['category_id' => function () {

            return Category::factory()->make();
        }]);
    }
}
