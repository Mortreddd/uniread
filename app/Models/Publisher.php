<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = [
        'authorID',
        'bookID',   
    ];
    
    public function authors()
    {   
        return $this->hasMany(Author::class, 'authorID', 'id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'bookID', 'id');
    }
}