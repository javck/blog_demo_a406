<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function renderBlogPage()
    {
        return view('blog');
    }

    public function renderPostPage()
    {
        return view('post');
    }
}
