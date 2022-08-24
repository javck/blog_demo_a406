<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function renderBlogPage()
    {
        $posts = Post::where('status','published')->orderBy('created_at','desc')->get();
        return view('blog',compact('posts'));
    }

    public function renderPostPage()
    {
        return view('post');
    }
}
