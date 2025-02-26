<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "user_id",
        "product_id",
        "created_at",
        "success_at",
        "cancel_at"
    ];
}
