<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'description',
        'image',
        'collaborative',
        'authorID'
    ];

    

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function chapters()
    {
         $this->hasMany(Chapter::class, 'id', 'bookID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id', 'bookID');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'bookID', 'id');
    }

    public function libraries()
    {
        return $this->belongsTo(Library::class, 'id', 'bookID');
    }
}