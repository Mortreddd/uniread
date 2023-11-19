<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;


    protected $fillable = [
        'authorID',
        'bookID'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'authorID');
    }

    public function votes()
    {
        return $this->hasMany(Book::class, 'id', 'bookID');
    }
}