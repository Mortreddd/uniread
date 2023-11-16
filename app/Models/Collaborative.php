<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborative extends Model
{
    use HasFactory;

    protected $fillable = [
        'authorID',
        'bookID'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'id');
    }

    public function authors()
    {
        return $this->hasMany(Author::class, 'authorID', 'id');
    }
}