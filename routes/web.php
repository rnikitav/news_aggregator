<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', function () {
    return view('lesone');
});

Route::get('/hello/{name}', function (string $name){
   echo <<<END
    <p>Рады приветствовать</p>
    <h2>$name</h2>
    <p>в нашем магазине </p>
END;
})->where('name' , '\w+');

Route::get('/{param}', function (string $param){
    if ($param == 'products'){
        echo 'Страница товаров';
        return;
    }
    echo 'Страница товара'. '<h4>' . $param . '</h4>';
});
