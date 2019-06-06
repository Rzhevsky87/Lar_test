<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
    * Mass assigned / Массовое заполнение
    * "Белый список" полей которые разршены для изменения
    * переменная $fillable обязательно называется так. Определено Laravel
    */
    protected $fillable = ['name', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

    /**
     * Получить все вопросы связанные с этой категорией.
     *
     */
    public function qestions()
    {
        return $this->belongsToMany('App\Models\Forum\Question');
    }
}
