<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'post', 'likes', 'tag', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
