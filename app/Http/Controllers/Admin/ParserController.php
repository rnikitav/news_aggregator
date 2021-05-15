<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\XMLParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index()
    {
        return view('parser.create');
    }

    public function storeNews(XMLParserService $XMLParserService, Request $request)
    {
        $data = $request->validate([
            'url' => ['required', 'url']
        ]);
        return $XMLParserService->parseAndCreateNews($data['url']);
    }
}
