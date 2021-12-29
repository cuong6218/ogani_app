<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_id', 'total_price', 'user_id', 'notes', 'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
