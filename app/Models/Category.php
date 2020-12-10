<?php


namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public static function getCategory () {
        return DB::select('SELECT * FROM categories');
    }

    public static function getOneCategory($id) {
        $news = DB::table('news')
            ->where('category_id', '=', $id)
            ->get();
        return $news;
    }

    public static function getMaxId () {
        return DB::table('categories')->max('id');
    }

}
