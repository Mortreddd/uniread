<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'chapter',
        'title',
        'content',
        'published',
        'bookID',
        'reads',
        'created_at',
        'updated_at'
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

    public function drafts()
    {
        return $this->hasMany(Draft::class, 'chapterID', 'id');
    }
}