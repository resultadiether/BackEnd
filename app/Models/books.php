<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; // Optional if following Laravel naming convention

    protected $fillable = [
        'title',
        'author',
        'category',
        'status', // e.g., "Available" or "Borrowed"
        'image',  // path or URL to image
    ];
}
