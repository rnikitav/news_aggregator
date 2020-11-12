<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(5);
        return  view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'idCategory' => 'required',
            'source_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'body' => 'required',
            'is_private' => 'required',
        ]);

        $data = $request->only(['idCategory', 'source_id', 'title', 'desc', 'img', 'body', 'is_private']);
        $data['slug'] = $data['title'];
        $create = News::create($data);
        if ($create) {
            return back()->with('success', 'Новость успешно добавлена');
        }

        return back()->with('fail', 'Не удалось добавить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        dd($news);
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'idCategory' => 'required',
            'source_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'body' => 'required',
            'is_private' => 'required',
        ]);
        $data = $request->only(['idCategory', 'source_id', 'title', 'desc', 'img', 'body', 'is_private']);
        $data['slug'] = $data['title'];
        $news->fill($data);
        if($news->save()) {
            return redirect()->route('news.index');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index');
//        return response()->json(['data' => 'delete']);
    }
}
