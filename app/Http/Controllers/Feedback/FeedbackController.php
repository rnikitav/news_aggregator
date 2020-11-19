<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackStore;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        $lastNewsCategory = Category::where(['slug' => 'Latest News'])->firstOrFail();
        if (Auth::user())
        {
            return view('feedback.createAuth', [
                'categories' => $allCategories,
                'lastNewsCategory' => $lastNewsCategory,
                'user_id' => Auth::user()->getAuthIdentifier(),
                'email' => Auth::user()->email,
            ]);
        }
        return view('feedback.create', [
            'categories' => $allCategories,
            'lastNewsCategory' => $lastNewsCategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackStore $request)
    {
        $data = $request->validated();
        if (!$data['email']){
            $data['email'] = 'noEmail';
        }
        $create = Feedback::create($data);
        if ($create) {
            return redirect()->route('feedback.create')->with('success', 'Отзыв успешно добавлен');
        }

        return back()->with('fail', 'Не удалось добавить отзыв');

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

