<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forum\Question;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Question $question)
    {
        $questions = $question->all();

        return view('forum.home', ['questions' => $questions]);
    }
}
