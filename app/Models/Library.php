<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Library extends Model
{
    use HasFactory;

    public $fillable = [
        'authorID',
        'bookID'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'bookID', 'id');
    }
}