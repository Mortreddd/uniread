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
}