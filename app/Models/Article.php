<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
        'status',
        'sub_category_id',
        'user_id'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasOneThrough(Category::class, SubCategory::class, 'id', 'id', 'sub_category_id', 'category_id');
    }
}
