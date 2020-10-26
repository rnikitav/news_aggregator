<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $categoryList = [
        [
            'id' => 1,
            'name' => 'Спорт',
            'slug' => 'sport',
        ],
        [
            'id' => 2,
            'name' => 'Экономика',
            'slug' => 'economy',
        ],
        [
            'id' => 3,
            'name' => 'Культура',
            'slug' => 'culture',
        ],
        [
            'id' => 4,
            'name' => 'Политика',
            'slug' => 'politics',
        ],
        [
            'id' => 5,
            'name' => 'Здоровье',
            'slug' => 'health',
        ],
    ];
    protected $newsList = [
        [
            'id' => 1,
            'idCategory' => 1,
            'slug' => 'one',
            'title' => 'Первая новость 1 категория',
            'desc' => 'Описание первой новости 1 категория',
        ],
        [
            'id' => 2,
            'idCategory' => 1,
            'slug' => 'two',
            'title' => 'Вторая новость 1 категория',
            'desc' => 'Описание второй новости 1 категория',
        ],
        [
            'id' => 3,
            'idCategory' => 1,
            'slug' => 'three',
            'title' => 'Третья новость 1 категория',
            'desc' => 'Описание третьей новости 1 категория',
        ],
        [
            'id' => 4,
            'idCategory' => 1,
            'slug' => 'four',
            'title' => '4 новость 1 категория',
            'desc' => 'Описание четвертой новости 1 категория',
        ],
        [
            'id' => 5,
            'idCategory' => 2,
            'slug' => 'one',
            'title' => '1 новость 2 категории',
            'desc' => 'Описание 1 новости 2 категория',
        ],
        [
            'id' => 6,
            'idCategory' => 2,
            'slug' => 'two',
            'title' => '2 новость 2 категории',
            'desc' => 'Описание 2 новости 2 категория',
        ],
        [
            'id' => 7,
            'idCategory' => 2,
            'slug' => 'three',
            'title' => '3 новость 2 категории',
            'desc' => 'Описание 3 новости 2 категория',
        ],
        [
            'id' => 8,
            'idCategory' => 2,
            'slug' => 'four',
            'title' => '4 новость 2 категории',
            'desc' => 'Описание 4 новости 2 категория',
        ],
        [
            'id' => 9,
            'idCategory' => 3,
            'slug' => 'one',
            'title' => '1 новость 3 категории',
            'desc' => 'Описание 1 новости 2 категория',
        ],
        [
            'id' => 10,
            'idCategory' => 3,
            'slug' => 'two',
            'title' => '2 новость 3 категории',
            'desc' => 'Описание 2 новости 3 категория',
        ],
        [
            'id' => 11,
            'idCategory' => 3,
            'slug' => 'three',
            'title' => '3 новость 3 категории',
            'desc' => 'Описание 3 новости 3 категория',
        ],
        [
            'id' => 12,
            'idCategory' => 3,
            'slug' => 'four',
            'title' => '4 новость 3 категории',
            'desc' => 'Описание 4 новости 3 категория',
        ],
        [
            'id' => 13,
            'idCategory' => 4,
            'slug' => 'one',
            'title' => '1 новость 4 категории',
            'desc' => 'Описание 1 новости 4 категория',
        ],
        [
            'id' => 14,
            'idCategory' => 4,
            'slug' => 'two',
            'title' => '2 новость 4 категории',
            'desc' => 'Описание 2 новости 4 категория',
        ],
        [
            'id' => 15,
            'idCategory' => 4,
            'slug' => 'three',
            'title' => '3 новость 4 категории',
            'desc' => 'Описание 3 новости 4 категория',
        ],
        [
            'id' => 16,
            'idCategory' => 4,
            'slug' => 'four',
            'title' => '4 новость 4 категории',
            'desc' => 'Описание 4 новости 4 категория',
        ],
        [
            'id' => 17,
            'idCategory' => 5,
            'slug' => 'one',
            'title' => '1 новость 5 категории',
            'desc' => 'Описание 1 новости 5 категория',
        ],
        [
            'id' => 18,
            'idCategory' => 5,
            'slug' => 'two',
            'title' => '2 новость 5 категории',
            'desc' => 'Описание 2 новости 5 категория',
        ],
        [
            'id' => 19,
            'idCategory' => 5,
            'slug' => 'three',
            'title' => '3 новость 5 категории',
            'desc' => 'Описание 3 новости 5 категория',
        ],
        [
            'id' => 20,
            'idCategory' => 5,
            'slug' => 'four',
            'title' => '4 новость 5 категории',
            'desc' => 'Описание 4 новости 5 категория',
        ],
    ];
}
