<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public $fillable = [
        'authorID',
        'bookID',
        'rating'
    ];

    public function authors()
    {
        return $this->hasMany(Author::class, 'authorID', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'id');
    }
}