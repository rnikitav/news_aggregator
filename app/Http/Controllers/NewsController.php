<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    protected $tableForTags = "tags";

    public function index(int $category)
    {
        $allCategories = $this->objCategories->getAllCategories();
        $tagsList = DB::table($this->tableForTags)->get();
        $newsForRenderByCategory = $this->objNews->getNewsListByCategory($category);
        $nameCategory = $this->objCategories->getNameCategoryById($category);
        $newsMostPopular = $this->objNews->getMostPopularNewsByCount(4);
        $newsTrending = $this->objNews->getMostTrendingNewsByCount(4);
        $lastNewsCategory = $this->objCategories->getCategoryBySlug('Latest News');



        return view('categories.categoryNews', [
            'categories' => $allCategories,
            'tags' => $tagsList,
            'category' => $nameCategory,
            'newsTrending' => $newsTrending,
            'mostPopular' => $newsMostPopular,
            'lastNewsCategory' => $lastNewsCategory,
            'newsPerPageBlog' => 4,
            'arrForNewsBlog' => $newsForRenderByCategory,
            ]);
    }

    public function showOne(int $category, int $id)
    {
        $oneNews = $this->objNews->getOneNewsById($id);
        $newsTagsList = $this->objNews->getTagsNameByNewsId($id);
        $newsMostPopular = $this->objNews->getMostPopularNewsByCount(4);
        $newsTrending = $this->objNews->getMostTrendingNewsByCount(4);
        $allCategories = $this->objCategories->getAllCategories();
        $lastNewsCategory = $this->objCategories->getCategoryBySlug('Latest News');
        if (!empty($oneNews)){
            return view('news.showOne' , [
                'news' => $oneNews,
                'tags' => $newsTagsList,
                'mostPopular' => $newsMostPopular,
                'trending' => $newsTrending,
                'categories' => $allCategories,
                'lastNewsCategory' => $lastNewsCategory,
                'singlePage' => true,
            ]);
        }
        return redirect()->route('news.category.show', $category);
    }
}
