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
        'completed',
        'collaborative',
        'votes',
        'authorID'
    ];


    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'bookID', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'bookID', 'id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'bookID', 'id');
    }
    public function library()
    {
        return $this->belongsTo(Library::class, 'bookID', 'id');
    }

    public function archive()
    {
        return $this->belongsTo(Library::class, 'bookID', 'id');
    }

}