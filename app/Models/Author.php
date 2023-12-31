<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Author extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, Notifiable, MustVerifyEmail;
    protected $fillable = [
            'fullname' ,
            'username',
            'gender',
            'birthday',
            'image',
            'email',
            'password',
            'last_login',
            'updated_at',
            'created_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
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
        return $this->hasMany(Follower::class, 'followerAuthorID', 'id');
    }

    public function followers()
    {
        return $this->hasMany(Follower::class, 'followedAuthorID', 'id');
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