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


    public function followers()
    {
        return $this->hasMany(Author::class, 'followedAuthorID', 'id');
    }

    public function following()
    {
        return $this->hasMany(Author::class, 'followerAuthorID', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'followerAuthorID', 'id');
    }

    public function followed()
    {
        return $this->belongsTo(Author::class, 'followedAuthorID', 'id');
    }
}