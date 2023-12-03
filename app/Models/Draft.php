<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;


    protected $fillable = [
        'authorID',
        'chapterID'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorID', 'id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'chapterID', 'id');
    }
}