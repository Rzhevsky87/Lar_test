<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Связь с таблицей Users
     *
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    /**
     * Связь с таблицей категорий
     *
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Forum\Category')
            ->withTimestamps();
    }
}
