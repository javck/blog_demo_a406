<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //一對多關係函式
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
