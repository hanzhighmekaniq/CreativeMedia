<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
