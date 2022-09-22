<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
Use  \TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    protected $fillable = ['title','content','content_small','sort','status','pic','category_id'];
    use HasFactory,Translatable;

    //一對一關係函示宣告
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getStatusName()
    {
        if($this->status == 'draft'){
            return '草稿';
        }else{
            return '上架';
        }
    }

}
