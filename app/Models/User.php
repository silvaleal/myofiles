<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    public function product() {
        return $this->hasMany(Product::class, 'user_id');
    }
}