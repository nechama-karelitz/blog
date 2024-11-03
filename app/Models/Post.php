<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Allow mass assignment on these fields
    protected $fillable = ['title', 'content', 'publish_date'];

    protected $casts = [
        'publish_date' => 'datetime',
    ];
}
