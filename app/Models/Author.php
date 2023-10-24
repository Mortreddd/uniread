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

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function follows()
    {
        return $this->belongsToMany(Author::class, 'followers', 'followerAuthorID', 'followedAuthorID');
    }

    public function followers()
    {
        return $this->belongsToMany(Author::class, 'followers', 'followedAuthorID', 'followerAuthorID');
    }
}