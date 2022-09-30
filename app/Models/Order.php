<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'trade_no', 'pay_type', 'pay_at', 'status'];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function getTitleAttribute(){
        $items = $this->items;
        $result = '';
        foreach ($items as $item) {
            $result = $result . $item->title . ',';
        }
        return $result;
    }
}
