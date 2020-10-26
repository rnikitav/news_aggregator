<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return redirect()->route('news');
    }
    public function create()
    {
        return view('news.createNews');
    }
    public function edit(int $id)
    {
        echo 'Редактировать новость с ID ' . $id;
    }
    public function delete(int $id)
    {
        echo 'Удалить новость с ID ' . $id;
    }
}
