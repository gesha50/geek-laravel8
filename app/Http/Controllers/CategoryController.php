<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getCategory() {
        return view('category',[
            'newsCategory' => Category::all()
        ]);
    }

    public function getOneCategory (Category $category) {
        return view('newsOneCategory',[
            'oneCategory' => News::where('category_id', $category->id)->get(), //Эта простая строка заменяет 4 верхних строки!
            'nameCategory' => $category->title,
            'newsCategory' => Category::all(),
        ]);
    }
}
