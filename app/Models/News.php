<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getAllNews()
    {
        return DB::table($this->table)->get();

    }

    public function getNewsListByCategory(int $idCategory)
    {
        return DB::table($this->table)
            ->join('categories', "$this->table.idCategory", '=', 'categories.id')
            ->join('source_news', "$this->table.source_id", '=', 'source_news.id')
            ->where(["$this->table.idCategory" => $idCategory])
            ->select('news.*', 'categories.name as idCategoryName', 'source_news.name as sourceName')
            ->get();
    }

    public function getOneNewsById(int $id)
    {
        $oneNews = DB::table($this->table)
            ->join('categories', "$this->table.idCategory", '=', 'categories.id')
            ->join('source_news', "$this->table.source_id", '=', 'source_news.id')
            ->where(["$this->table.id" => $id])
            ->select('news.*', 'categories.name as idCategoryName', 'source_news.name as sourceName')
            ->first();

        if (empty($oneNews))
        {
            return redirect()->back();
        }
        return $oneNews;
    }

    public function getTagsNameByNewsId(int $id)
    {
        return DB::table('news_tags')
            ->join("$this->table", "$this->table.id", '=', 'news_tags.news_id')
            ->join('tags', 'news_tags.tag_id', '=', 'tags.id')
            ->where(["$this->table.id" => $id])
            ->select('tags.name')
            ->get();
    }

    public function getLastNews()
    {
        $lastId = DB::table($this->table)->max('id');
        return DB::table($this->table)->where(['id' => $lastId])->first();

    }

    public function getLatestNewsForRightTopBlog()
    {
        //сортировка по id и получаем с предпоследней 4 новости
        return DB::table($this->table)->latest('id')->skip(1)->take(4)->get();
    }

    public function getMostPopularNewsByCount(int $count)
    {
        // 4 новости с макс просмотрами
        return DB::table($this->table)->orderBy('views', 'desc')->take($count)->get();
    }
    public function getMostTrendingNewsByCount(int $count)
    {
        // 4 новости с макс лайками
        return DB::table($this->table)->orderBy('likes', 'desc')->take($count)->get();
    }

    public function getRandomNewsByCount(int $count)
    {
        // 4  случайных новости
        return DB::table($this->table)->inRandomOrder()->take($count)->get();
    }
}
