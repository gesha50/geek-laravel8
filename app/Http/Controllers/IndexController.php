<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index () {
        $category = CATEGORY::getCategory();
        return view('home',[
            'newsCategory' => $category
        ]);
    }
}
