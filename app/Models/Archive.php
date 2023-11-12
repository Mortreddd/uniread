<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'authorID',
        'bookID'
    ];

    public $timestamps = true;

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'id', 'bookID');
    }
}