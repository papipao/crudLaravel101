<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'title', 'price', 'category_id', 'image',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
