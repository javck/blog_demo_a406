<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return json_encode($posts, JSON_UNESCAPED_UNICODE);
    }

    public function show(Request $request,$id){
        $post = Post::findOrFail($id);
        return json_encode($post, JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request){
        $data = ['title' => $request->title , 'content' => $request->content];

        return response()->noContent(Response::HTTP_CREATED); //回傳201狀態碼
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
        return view('posts.create',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('title','id');
        return view('posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = Post::findOrFail($id);
        $post->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //匯出文章內容 Excel 檔案
    public function export() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    //匯入文章內容
    public function import() 
    {
        Excel::import(new PostsImport, 'posts.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
