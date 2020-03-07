<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    
    protected $fillable = [
        'user_id', 'movie_id', 'votes',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
