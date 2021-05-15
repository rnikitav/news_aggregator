<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;

class NewsCategoryController extends Controller
{
    protected $paginateNewsCount = 4;

    public function index(int $category)
    {
        $allCategories = Category::all();
        $tagsList = Tag::all();
        $categoryCollection = Category::findOrFail($category);
        $newsMostPopular = News::orderBy('views', 'desc')->take($this->paginateNewsCount)->get();
        $newsTrending = News::orderBy('likes', 'desc')->take($this->paginateNewsCount)->get();;
        $lastNewsCategory = Category::where(['slug' => 'Latest News'])->firstOrFail();
        $newsList = $categoryCollection->newsListByCategory()->paginate(5);


        return view('categories.categoryNews', [
            'categories' => $allCategories,
            'tags' => $tagsList,
            'category' => $categoryCollection,
            'newsTrending' => $newsTrending,
            'mostPopular' => $newsMostPopular,
            'lastNewsCategory' => $lastNewsCategory,
            'arrForNewsBlog' => $newsList,
            'paginateForPage' => true,
        ]);
    }
}
