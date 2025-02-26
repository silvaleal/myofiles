<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "category_id", 
        "name", 
        "slug", 
        "price", 
        "description", 
        "file_path"
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
