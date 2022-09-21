<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function renderBlogPage()
    {
        $posts = Post::where('status','published')->orderBy('created_at','desc')->paginate(setting('admin.posts_per_page'));
        return view('blog',compact('posts'));
    }

    public function renderPostPage($id)
    {
        $post = Post::findOrFail($id);
        return view('post',compact('post'));
    }

    public function renderBlogPageByCategory(Category $category)
    {
        //$category = Category::findOrFail($category_id);
        $posts = $category->posts()->paginate(setting('admin.posts_per_page'));
        return view('blog',compact('posts'));
    }

    public function renderMyPostForm()
    {
        $categories = Category::pluck('title','id');
        return view('post_form',compact('categories'));
    }

    
}
