<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::get();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //使用控制器實例來驗證
        // $this->validate($request,[
        //     'title' => 'required|max:125',
        //     'content' => 'required',
        //     'content_small' => 'required',
        //     'category_id' => 'required'
        //     ]);

        //手動建立驗證器
        // $validator = Validator::make($request->all(),[
        //     'title' => 'required|max:125',
        //     'content' => 'required',
        //     'content_small' => 'required',
        //     'category_id' => 'required'
        // ]);

        // if($validator->fails()){
        //     //dd('validate fail');
        //     return redirect('/posts/create')->withErrors($validator)->withInput();
        // }

        $data = $request->all();
        Post::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('posts');
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
