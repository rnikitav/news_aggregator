<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $lastNewsCategory = [];
        $arrForNewsMainTopLeft = [];
        $arrForMostPopular = [];
        // 4 news array
        $arrForNewsMainTopRight = [];
        $arrForNewsBlog = [];
        foreach ($this->categoryList as $one){
            if (is_array($one) && $one['slug'] == 'Latest News'){
                $lastNewsCategory = $one;
            }
        }
        if (isset($this->homeNewsTopListLeft) && !empty($this->homeNewsTopListLeft))
        {
            $arrForNewsMainTopLeft = $this->homeNewsTopListLeft;
        }
        if (isset($this->arrMostPopular) && !empty($this->arrMostPopular))
        {
            $arrForMostPopular = $this->arrMostPopular;
        }
        if (isset($this->homeNewsTopListRight) && !empty($this->homeNewsTopListRight))
        {
            // TODO массив для главной страницы Блога News пока из главного
            $arrForNewsMainTopRight = $this->homeNewsTopListRight;
            $arrForNewsBlog = $this->homeNewsTopListRight;
        }



        return view('home.index', [
            'categories' => $this->categoryList,
            'mostPopular' => $arrForMostPopular,
            'trending' => $this->arrTrending,
            'tags' => $this->arrTags,
            'lastNewsCategory' => $lastNewsCategory,
            'topLeft' => $arrForNewsMainTopLeft,
            'topRight' => $arrForNewsMainTopRight,
            'arrForNewsBlog' => $arrForNewsBlog,
            'newsPerPageBlog' => 4,
        ]);
    }
}
