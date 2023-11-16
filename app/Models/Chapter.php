<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapterNumber',
        'title',
        'content',
        'bookID'
    ];


    public $timestamps = true;
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'chapterID', 'id');
    }

    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class, 'id', 'chapterID');
    }
}