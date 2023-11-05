<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];


    public $timestamps = true;

    public function books()
    {
        return $this->hasMany(Book::class, 'authorID', 'id');
    }

    public function followed()
    {
        return $this->hasMany(Follower::class, 'id', 'followerAuthorID');
    }

    
    public function rate()
    {
        return $this->belongsTo(Rating::class, 'id', 'authorID');
    }

    public function library()
    {
        return $this->hasOne(Library::class, 'authorID', 'id');
    }
}