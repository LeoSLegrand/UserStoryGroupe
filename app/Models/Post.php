<?php

// dans le fichier Post.php
// Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content'];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
