<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Получить все вопросы связанные с этой категорией
     *
     */
    public function qestions()
    {
        return $this->belongsToMany('App\Models\Forum\Question');
    }
}
