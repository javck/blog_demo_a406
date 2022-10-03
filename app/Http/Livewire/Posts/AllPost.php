<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class AllPost extends Component
{
    public $posts;
    public $index = 1;
    public $message = '';

    protected $listeners = ['Event1' => 'event1'];

    protected $rules = [
        'posts.*.category_id' => 'required',
        'posts.*.title' => 'required|string',
        'posts.*.content_small' => 'required|string',
        'posts.*.content' => 'required|string',
        'posts.*.sort' => 'min:1|required'
    ];

    public function getStatusProperty()
    {
        $_status = $this->posts[$this->index]->status;
        if($_status =='published'){
            return '已發布';
        }else{
            return '草稿';
        }
    }

    public function render()
    {
        return view('livewire.posts.all-post')->extends('layout.master')->section('body');
    }

    public function mount()
    {
        $this->posts = Post::orderBy('id','asc')->get();
    }

    public function left()
    {
        if($this->index > 0){
            $this->index -=1;
        }
    }

    public function right()
    {
        if($this->index < count($this->posts)){
            $this->index +=1;
        }
    }

    public function hello($name)
    {
        $this->message = 'Hello,' . $name;
    }

    public function event1()
    {
        $this->message = 'Event1';
    }
}
