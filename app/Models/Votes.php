<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;


    protected $fillable = [
        'authorID',
        'bookID',
        'chapterID'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'authorID', 'id');
    }

    public function votes()
    {
        return $this->hasMany(Book::class, 'bookID', 'id');
    }
}