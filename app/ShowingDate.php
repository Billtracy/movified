<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowingDate extends Model
{
    
protected $fillable = [
    'year','month', 'date', 'hour', 'minutes', 'seconds',
    ];

}
