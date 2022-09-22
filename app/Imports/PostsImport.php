<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class PostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row); //可檢視 $row 的內容
        $category = Category::where('title',$row[0])->first();
        $status = null;
        if($row[5] == '上架'){
            $status = 'published';
        }else{
            $status = 'draft';
        }
        return new Post([
           'category_id'     => $category->id,
           'title'    => $row[1], 
           'content_small' => $row[2],
           'content' => $row[3],
           'status' => $status,
           'sort' => $row[5],
           'pic' => $row[6],
        ]);
    }
}