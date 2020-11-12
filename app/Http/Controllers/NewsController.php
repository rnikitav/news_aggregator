<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    protected $paginateNewsCount = 4;

    public function showOne(int $category, int $id)
    {
        $oneNews = News::find($id);
        if (empty($oneNews)){
            return redirect()->route('news.category.show', $category);
        }
        $sourceNews = $oneNews->resource;
        $categoriesListForOneNews = $oneNews->categories;
        $newsTagsList = $oneNews->tags;
        $newsMostPopular = News::orderBy('views', 'desc')->take($this->paginateNewsCount)->get();
        $newsTrending = News::orderBy('likes', 'desc')->take($this->paginateNewsCount)->get();
        $allCategories = Category::all();
        $lastNewsCategory = Category::where(['slug' => 'Latest News'])->firstOrFail();;

        return view('news.showOne' , [
            'news' => $oneNews,
            'tags' => $newsTagsList,
            'mostPopular' => $newsMostPopular,
            'trending' => $newsTrending,
            'categories' => $allCategories,
            'categoriesForOneNews' => $categoriesListForOneNews,
            'lastNewsCategory' => $lastNewsCategory,
            'singlePage' => true,
            'sourceNews' => $sourceNews,
        ]);

    }
}
