<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'followerAuthorID',
        'followedAuthorID'
    ];

    public $timestamps = true;

    public function authors()
    {
        return $this->hasMany(Author::class, 'followedAuthorID', 'id');
    }
}