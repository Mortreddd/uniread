<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    use HasFactory;

    public $fillable = [
        'chapterID',
        'authorID',
        'content',
        'likes'
    ];


    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class, 'id', 'authorID');
    }
}