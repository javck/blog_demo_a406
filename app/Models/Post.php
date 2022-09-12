<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use  \TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use HasFactory,Translatable;

    //一對一關係函示宣告
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
