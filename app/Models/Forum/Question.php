<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasOne('App\Models\Auth\User');
    }
}
