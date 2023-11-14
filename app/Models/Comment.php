<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'authorID',
        'bookID',
        'content'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'id');
    }
    public function authors()
    {
        return $this->hasMany(Author::class, 'id', 'authorID');
    }
}