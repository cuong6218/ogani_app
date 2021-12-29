<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
class Customer extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone'
    ];
}
