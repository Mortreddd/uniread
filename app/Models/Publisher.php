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
    
    public function author()
    {   
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'id');
    }
}