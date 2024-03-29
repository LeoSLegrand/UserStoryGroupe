<?php

// dans le fichier Comment.php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
