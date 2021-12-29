<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'name', 'cate_id', 'image_url', 'price'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
