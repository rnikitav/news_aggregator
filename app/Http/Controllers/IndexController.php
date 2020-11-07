<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    protected $tableForTags = "tags";

    public function index()
    {
        $categoriesList = $this->objCategories->getAllCategories();
        $lastNewsCategory = $this->objCategories->getCategoryBySlug('Latest News');
        $newsMainTopLeft = $this->objNews->getLastNews();
        $newsMainTopRight = $this->objNews->getLatestNewsForRightTopBlog();
        $newsMostPopular = $this->objNews->getMostPopularNewsByCount(4);
        $newsBlog = $this->objNews->getRandomNewsByCount(4);
        $newsTrending = $this->objNews->getMostTrendingNewsByCount(5);
        $tagsList = DB::table($this->tableForTags)->get();


        return view('home.index', [
            'categories' => $categoriesList,
            'mostPopular' => $newsMostPopular,
            'trending' => $newsTrending,
            'tags' => $tagsList,
            'lastNewsCategory' => $lastNewsCategory,
            'topLeft' => $newsMainTopLeft,
            'topRight' => $newsMainTopRight,
            'arrForNewsBlog' => $newsBlog,
            'newsPerPageBlog' => 4,
        ]);
    }
}
