<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twit extends Model
{
    protected $fillable = [
        'CategoryId',
        'Username',
        'Content'
    ];

    public $timestamps = false;
}
