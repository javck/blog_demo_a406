<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function renderBlogPage()
    {
        $posts = Post::where('status','published')->orderBy('created_at','desc')->paginate(5);
        return view('blog',compact('posts'));
    }

    public function renderPostPage($id)
    {
        $post = Post::findOrFail($id);
        return view('post',compact('post'));
    }
}
