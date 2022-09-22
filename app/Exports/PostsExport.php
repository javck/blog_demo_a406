<?php

namespace App\Exports;

use App\Models\Post;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PostsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Post::all();
    // }

    public function view(): View
    {
        return view('exports.posts', [
            'posts' => Post::all()
        ]);
    }
}
