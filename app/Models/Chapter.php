<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookID',
        'title',
        'content'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}