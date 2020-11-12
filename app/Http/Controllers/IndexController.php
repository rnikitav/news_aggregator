<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    protected $paginateNewsCount = 4;

    public function index()
    {
        $categoriesList = Category::all();
        $lastNewsCategory = Category::where(['slug' => 'Latest News'])->firstOrFail();
        $newsMainTopLeft = News::latest('id')->first();
        $newsMainTopRight = News::latest('id')->skip(1)->take(4)->get();
        $newsMostPopular = News::orderBy('views', 'desc')->take($this->paginateNewsCount)->get();
        $newsBlog = News::inRandomOrder()->take($this->paginateNewsCount)->get();
        $newsTrending = News::orderBy('likes', 'desc')->take($this->paginateNewsCount + 1)->get();
        $tagsList = Tag::all();


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
            'paginateForPage' => false,
        ]);
    }
}
