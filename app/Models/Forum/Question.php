<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Question extends Model
{
    /**
     * Связь с таблицей Users
     *
     */
    public function users()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
