<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Category extends Model
{
    use Notifiable;
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
