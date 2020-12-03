<?php


namespace App\Models;
use DB;

class Category
{
    public static function getCategory () {
        return DB::select('SELECT * FROM categories');
    }

    public static function getOneCategory($id) {
        $news = DB::table('news')
            ->where('category_id', '=', $id)
            ->get();
        return $news;
    }

}
