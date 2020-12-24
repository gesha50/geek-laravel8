<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    // в массивах $categories и $slug должно быть одинаковое количество!
    public $categories = ['Спорт', 'Образование', 'Отдых', 'Пандемия', 'Политика'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<count($this->categories);$i++){
            $arr = ['title' => $this->categories[$i], 'slug' => Str::slug($this->categories[$i])];
//            Category::create($arr);
            \DB::table('categories')->insert($arr);
        }
    }
}
