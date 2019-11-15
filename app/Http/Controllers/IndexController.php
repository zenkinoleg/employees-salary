<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function about()
    {
        return view('index/about');
    }
}
