<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $objCategories;
    protected $objNews;


    protected $newsList = [
        [
            'id' => 1,
            'idCategory' => 1,
            'slug' => 'one',
            'title' => 'Первая новость 1 категория',
            'desc' => 'Описание первой новости 1 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 2,
            'idCategory' => 1,
            'slug' => 'two',
            'title' => 'Вторая новость 1 категория',
            'desc' => 'Описание второй новости 1 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Technology', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 3,
            'idCategory' => 1,
            'slug' => 'three',
            'title' => 'Третья новость 1 категория',
            'desc' => 'Описание третьей новости 1 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Lifestyle', 'Three', 'Photography', 'Lifestyle']
        ],
        [
            'id' => 4,
            'idCategory' => 1,
            'slug' => 'four',
            'title' => '4 новость 1 категория',
            'desc' => 'Описание четвертой новости 1 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Education', 'Social', 'Art', 'Social']
        ],
        [
            'id' => 5,
            'idCategory' => 2,
            'slug' => 'one',
            'title' => '1 новость 2 категории',
            'desc' => 'Описание 1 новости 2 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 6,
            'idCategory' => 2,
            'slug' => 'two',
            'title' => '2 новость 2 категории',
            'desc' => 'Описание 2 новости 2 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 7,
            'idCategory' => 2,
            'slug' => 'three',
            'title' => '3 новость 2 категории',
            'desc' => 'Описание 3 новости 2 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 8,
            'idCategory' => 2,
            'slug' => 'four',
            'title' => '4 новость 2 категории',
            'desc' => 'Описание 4 новости 2 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 9,
            'idCategory' => 3,
            'slug' => 'one',
            'title' => '1 новость 3 категории',
            'desc' => 'Описание 1 новости 2 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 10,
            'idCategory' => 3,
            'slug' => 'two',
            'title' => '2 новость 3 категории',
            'desc' => 'Описание 2 новости 3 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 11,
            'idCategory' => 3,
            'slug' => 'three',
            'title' => '3 новость 3 категории',
            'desc' => 'Описание 3 новости 3 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 12,
            'idCategory' => 3,
            'slug' => 'four',
            'title' => '4 новость 3 категории',
            'desc' => 'Описание 4 новости 3 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 13,
            'idCategory' => 4,
            'slug' => 'one',
            'title' => '1 новость 4 категории',
            'desc' => 'Описание 1 новости 4 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 14,
            'idCategory' => 4,
            'slug' => 'two',
            'title' => '2 новость 4 категории',
            'desc' => 'Описание 2 новости 4 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 15,
            'idCategory' => 4,
            'slug' => 'three',
            'title' => '3 новость 4 категории',
            'desc' => 'Описание 3 новости 4 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 16,
            'idCategory' => 4,
            'slug' => 'four',
            'title' => '4 новость 4 категории',
            'desc' => 'Описание 4 новости 4 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 17,
            'idCategory' => 5,
            'slug' => 'one',
            'title' => '1 новость 5 категории',
            'desc' => 'Описание 1 новости 5 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 18,
            'idCategory' => 5,
            'slug' => 'two',
            'title' => '2 новость 5 категории',
            'desc' => 'Описание 2 новости 5 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 19,
            'idCategory' => 5,
            'slug' => 'three',
            'title' => '3 новость 5 категории',
            'desc' => 'Описание 3 новости 5 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nathan-mcbride-229637.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 20,
            'idCategory' => 5,
            'slug' => 'four',
            'title' => '4 новость 5 категории',
            'desc' => 'Описание 4 новости 5 категория',
            'view' => 0,
            'created_at' => '2020-10-22',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => '1.jpg',
            'body' => 'Lorem10',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
    ];
    // Новости для главной Top все
    protected $homeNewsTopListLeft =
        [
            'id' => 21,
            'idCategory' => 5,
            'slug' => 'homeTop',
            'title' => 'Top left 1 said and done, more is said than done',
            'desc' => 'Описание 1 новости home Top',
            'view' => 0,
            'created_at' => '2020-01-02',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nick-karvounis-78711.jpg',
            'body' => 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!',
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ];
    protected $homeNewsTopListRight = [
        [
            'id' => 22,
            'idCategory' => 1,
            'slug' => 'homeTop',
            'title' => 'Top 1 is said and done, more is said than done',
            'desc' => 'Описание 2 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-05-02',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 23,
            'idCategory' => 2,
            'slug' => 'homeTop',
            'title' => 'Top 2 is said and done, more is said than done',
            'desc' => 'Описание 3 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-04-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 24,
            'idCategory' => 3,
            'slug' => 'homeTop',
            'title' => 'Top 3 is said and done, more is said than done',
            'desc' => 'Описание 4 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-03-07',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 25,
            'idCategory' => 4,
            'slug' => 'homeTop',
            'title' => 'Top 4 is said and done, more is said than done',
            'desc' => 'Описание 5 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-01-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
    ];
    protected $arrMostPopular = [
        [
            'id' => 26,
            'idCategory' => 1,
            'slug' => 'MostPopular',
            'title' => 'MostPopular 1  than done',
            'desc' => 'Описание 2 новости 5 home top',
            'view' => 110,
            'created_at' => '2020-05-02',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'download (1).jpg',
            'body' => "Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 27,
            'idCategory' => 2,
            'slug' => 'MostPopular',
            'title' => 'MostPopular 2 is said and  than done',
            'desc' => 'Описание 3 новости 5 home top',
            'view' => 100,
            'created_at' => '2020-04-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 28,
            'idCategory' => 3,
            'slug' => 'MostPopular',
            'title' => 'MostPopular 3 is said and done, more is said than done',
            'desc' => 'Описание 4 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-03-07',
            'updated_at' => '2020-10-22',
            'likes' => 90,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 29,
            'idCategory' => 4,
            'slug' => 'MostPopular',
            'title' => 'MostPopular 4 ',
            'desc' => 'Описание 5 новости 5 home top',
            'view' => 80,
            'created_at' => '2020-01-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
    ];
    protected $arrTrending = [
        [
            'id' => 30,
            'idCategory' => 1,
            'slug' => 'Trending',
            'title' => 'Trending 1  than done',
            'desc' => 'Описание 2 новости 5 home top',
            'view' => 110,
            'created_at' => '2020-05-02',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'allef-vinicius-108153.jpg',
            'body' => "Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 31,
            'idCategory' => 2,
            'slug' => 'Trending',
            'title' => 'Trending 2 is said and  than done',
            'desc' => 'Описание 3 новости 5 home top',
            'view' => 100,
            'created_at' => '2020-04-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'abigail-keenan-65477.jpg',
            'body' => "Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 32,
            'idCategory' => 3,
            'slug' => 'Trending',
            'title' => 'Trending 3 is said and done, more is said than done',
            'desc' => 'Описание 4 новости 5 home top',
            'view' => 0,
            'created_at' => '2020-03-07',
            'updated_at' => '2020-10-22',
            'likes' => 90,
            'dislike' => 0,
            'img' => 'ryan-moreno-98837.jpg',
            'body' => "Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 33,
            'idCategory' => 4,
            'slug' => 'Trending',
            'title' => 'Trending 4 ',
            'desc' => 'Описание 5 новости 5 home top',
            'view' => 80,
            'created_at' => '2020-01-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'science-578x362.jpg',
            'body' => "Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
        [
            'id' => 34,
            'idCategory' => 4,
            'slug' => 'Trending',
            'title' => 'Here\'s a new way to take better photos for instagram',
            'desc' => 'Here\'s a new way to take better photos for instagram',
            'view' => 80,
            'created_at' => '2020-01-01',
            'updated_at' => '2020-10-22',
            'likes' => 1,
            'dislike' => 0,
            'img' => 'nick-karvounis-78711.jpg',
            'body' => "Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. At, harum!",
            'tags' => ['Business', 'Sport', 'Art', 'Social']
        ],
    ];
    protected $arrTags = ['Business','Sport','Art','Social', 'Technology', 'Education', 'Lifestyle', 'Three', 'Photography'];

    /**
     * Controller constructor.
     *
     */
    public function __construct()
    {
        $this->objCategories = new Categories();
        $this->objNews = new News();
    }

}
