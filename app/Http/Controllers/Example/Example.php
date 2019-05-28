<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forum\Question;
use App\Models\Auth\User;

class Example extends Controller
{
    /**
     * Show the test page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Question $question)
    {
        $title = $question->where('id', 1)->first()->title; // Вернет строку
        $text = $question->where('id', 1)->first()->text; // Вернет строку
        // dd($question->first()->toArray()); // Вернет массив
        // $title = $question->get('title');dd($title); // Вернет массив экземпляров (Collection)
        // dd($question->all()); // Вернет массив экземпляров (Collection)
        // dd ($question->findOrFail(1)); // Вернет указанный экземпляр или исключение
        // dd($question->where('id', 1)->first()); // Вернет указанный экземпляр
        return view('Examples.Example', [
            'title' => $title,
            'text' => $text
            ]);
    }

    /**
     * Test
     *
     */
    public static function test(User $users)
    {
        $users = $users::all();

        dd($users);
    }

    /**
     * Test 2
     *
     */
    public static function test2(Question $question)
    {
        dd ($question->userName());
    }

    /**
     * Статьи пользователя
     *
     */
    public function Questions (User $user)
    {
        $user = $user->find(4); // Вернул объект user(а)
        dd ($user);
        $question = $user->questions; // Все его статьи

        $user = $user->questions(); // Вернуть объект HasMany содержащий в т.ч. объект User
        $questions = $user->get()->toArray(); // Вернет коллекцию с массивом объектов questions
    }

    public function User (Question $question)
    {
        $question = $question->findOrFail(2); // Вернул объект question
        $user = $question->user;
        dd ($user);
    }
}
