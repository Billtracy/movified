<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    
    protected $fillable = [
        'user_id', 'movie_id', 'user_api_token', 'votes',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
