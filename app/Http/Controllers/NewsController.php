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
        return view('news.categoryNews', ['news' => $arrForRenderCategory]);
    }

    public function showOne(int $category, int $id)
    {
        $news = $this->getNewsById($id);
        if (!empty($news)){
            return view('news.showOne' , ['news' => $news]);
        }
        return redirect()->route('news.category.show', $category);
    }
    private function getNewsById(int $id)
    {
        foreach ($this->newsList as $one){
            if ($one['id'] === $id){
                return $one;
            }
        }
        return [];

    }
}
