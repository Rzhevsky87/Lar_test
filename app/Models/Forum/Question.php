<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Users;

class Question extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\Models\Auth\User');
    }

    /**
     * Test
     *
     */
    public static function test(Users $users) {
        $users = $users::all()->name;

        foreach ($users as $user)
        {
            echo $user;
        }
    }
}
