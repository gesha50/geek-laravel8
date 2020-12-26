<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class addToDBTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddToDB()
    {
        $data = News::factory()->create()->toArray();
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('news', $data);
    }

    public function testEditNewsCorrectInDB()
    {
        $model = News::factory()->withCategoryID()->create();
        $news = $model->toArray();
        $newTitle = $this->faker->sentence(rand(3,10));
        $newSpoiler = $this->faker->text(rand(100,300));

        $data =  [
            'category_id' => 1,   // rand(1, $maxCategoryId)
//        'image' => "",
            'is_private' => rand(0,1),
            'title' => $newTitle,
            'spoiler' => $newSpoiler,
            'description' => $news['description']
        ];

        $response = $this->patch(route('admin.news.update', $model), $data);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('news', $news);

        $this->assertDatabaseHas('news', $data);
    }
}
