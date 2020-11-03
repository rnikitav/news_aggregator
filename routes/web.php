<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Feedback\FeedbackController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsCategoryController;
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

Route::get('/', [IndexController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/news', NewsController::class);
});
Route::resource('feedback', FeedbackController::class);

Route::group(['prefix' => 'news'], function (){
    Route::get('/', [NewsCategoryController::class , 'index'])->name('news');
    Route::get('/{categoryid}', [\App\Http\Controllers\NewsController::class, 'index'])
        ->where('category', '\d+')->name('news.category.show');
    Route::get('/{categoryid}/{id}', [\App\Http\Controllers\NewsController::class , 'showOne'])
        ->where('id', '\d+')->name('news.show');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
