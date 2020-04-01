<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votable extends Model
{
    protected $fillable = [
        'check_votes',
    ];
}
