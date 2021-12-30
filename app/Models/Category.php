<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
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
    protected static function factory() {
        return CategoryFactory::new();
    }
}
