<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forum\Question;
use App\Models\Auth\User;
use App\Models\Forum\Category;

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
     * Test Вернуть всех юзеров
     *
     */
    public static function test(User $users)
    {
        $users = $users::all();

        dd($users);
    }

    /**
     * Test 2 Вернуть юзеров через Question
     *
     */
    public static function test2(Question $question)
    {
        dd ($question->first()->user);
    }

    /**
     * Статьи пользователя
     *
     */
    public function UserQuestions (User $user)
    {
        $user = $user->find(4); // Вернул объект user(а)
        $questions = $user->questions; // Все его статьи

        $user = $user->questions(); // Вернуть объект HasMany содержащий в т.ч. объект User
        $questions = $user->get()->toArray(); // Вернет коллекцию с массивом объектов questions
    }

    /**
     * Вопросы пользователя
     *
     */
    public function User (Question $question)
    {
        $question = $question->find(2); // Вернул объект question
        $user = $question->user; // Вернул юзера из связанной таблицы
        $userName = $user->name; // Вернул имя с помощью динамического метода "name"

        $question = $question->user();
        $user = $question->get()->toArray();
    }

    /**
     * Категории вопроса (категории через вопрос)
     *
     */
    public function categories (Question $question){
        $category = $question->find(1)->categories()->first()->name; // Вернет имя категории
        dd ($category);
    }

    /**
     * Вопросы категории (вопрос через категории)
     *
     */
    public function qestions(Category $category) {
        $qestions = $category->find(1)->qestions()->first()->title; // Вернтет заголовок вопроса
        dd ($qestions);
    }
}
