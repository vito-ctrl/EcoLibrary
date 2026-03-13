<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'description',
        'published_year',
        'category_id',
        'views',
        'degraded_copies',
        'total_copies'
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
