<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class OnePost extends Component
{
    public Post $post;
    public function render()
    {
        //return view('livewire.posts.one-post',['post'=>$this->post])->extends('layout.master')->section('body');
        return view('livewire.posts.one-post')->extends('layout.master')->section('body');
    }

    // public function mount(Post $post)
    // {
    //     $this->post = $post;
    // }
}
