<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $fillable = [
        'subject',
        'email',
        'genre',
        'message',
        'user_id'
    ];
}
