<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{
    public function create(): View
    {
        return view('posts.index');
    }
}
