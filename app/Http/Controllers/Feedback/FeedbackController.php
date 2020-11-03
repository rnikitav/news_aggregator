<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->news;
        $fileName = storage_path('app/news.txt');
        if(file_exists($fileName)) {
            $file = file_get_contents($fileName);
            $newsFile = json_decode($file, true);
        }
        if(isset($newsFile) && !empty($newsFile)) {
            $news = $newsFile;
        }

        return  view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.create', [
            'categories' => $this->categoryList,
            'lastNewsCategory' => $this->categoryList[0],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'description' => 'required'
        ]);
//        $res = $request->validate([
//            'name' => 'required',
//            'email'=> 'required',
//            'description' => 'required'
//        ]);
        if ($validator->fails()) {
            return redirect('feedback/create')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Отзыв не отправлен обязательные поля Name , email, Description');
        }
        $data = $request->only(['name', 'email', 'title', 'description']);

        $saveFile = function(array $data) {
            $fileNews = storage_path('app/feedback.txt');
            file_put_contents($fileNews, PHP_EOL. json_encode($data), FILE_APPEND);
        };

        $saveFile($data);
//        return redirect()->back();
//        return Redirect::to('/feedback/create')->isInformational('dasdas');
        return redirect()->route('feedback.create')->with('status', 'Отзыв отправлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function show(FeedBack $feedBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedBack $feedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedBack $feedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedBack $feedBack)
    {
        //
    }
}

