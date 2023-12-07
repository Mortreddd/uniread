<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'authorID',
        'violation' 
    ];


    public $timestamps = true; 


    public function authors()
    {
        return $this->hasMany(Author::class, 'authorID', 'id');
    }
}