<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'senderAuthorID',
        'receiverAuthorID',
        'content'
    ];

    public $timestamps = true;

    public function sender()
    {
        return $this->belongsTo(Author::class, 'senderAuthorID', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(Author::class, 'receiverAuthorID', 'id');
    }


    public function messages()
    {
        return $this->hasManyThrough(Author::class, 'senderAuthorID', 'id');
    }

}