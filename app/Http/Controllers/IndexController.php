<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index () {
        return view('home',[
            'newsCategory' => Category::all()
        ]);
    }

    public function privacy () {
        return view('privacy',[
            'newsCategory' => Category::all()
        ]);
    }
}
