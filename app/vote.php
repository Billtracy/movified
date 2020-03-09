<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    
    protected $fillable = [
        'user_email', 'movie_title',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
