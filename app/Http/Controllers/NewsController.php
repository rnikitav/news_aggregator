<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(int $category)
    {
        $arrForRenderCategory = [];
        foreach ($this->newsList as $one){
            if ($one['idCategory'] === $category){
                array_push($arrForRenderCategory, $one);
            }
        }
        return view('categories.categoryNews', [
            'categories' => $this->categoryList,
            'lastNewsCategory' => $this->categoryList[0],
            'newsPerPageBlog' => 4,
            'arrForNewsBlog' => $arrForRenderCategory,
            ]);
    }

    public function showOne(int $category, int $id)
    {
        $news = $this->getNewsById($id);
        if (!empty($news)){
            return view('news.showOne' , [
                'news' => $news,
                'categories' => $this->categoryList,
                'lastNewsCategory' => $this->categoryList[0],
                'singlePage' => true,
            ]);
        }
        return redirect()->route('news.category.show', $category);
    }
    private function getNewsById(int $id)
    {
        $allNews = array_merge($this->newsList, $this->homeNewsTopListRight);
        array_push($allNews, $this->homeNewsTopListLeft);

        foreach ($allNews as $one){
            if ($one['id'] === $id){
                return $one;
            }
        }
        return [];

    }
}
