<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::all();
        return view('question.questions')->with("questions", $questions);
    }

    public function show(Question $question) {
        return view("question.questions")->with("question", $question);
    }

    public function create() {
        $this->authorize('isAdmin');
        $questions = Question::all();
        return view("question.create", compact('questions'));
    }

    public function save(QuestionRequest $req) {
        $this->authorize('isAdmin');
        $question = new Question($req->all());
        $question -> save();
        $answers = array(new Answer, new Answer, new Answer, new Answer);

        for ($x = 0; $x < count($answers); $x++) {
            $answers[$x] -> answerContent = $req->input("answer{$x}");
            $answers[$x] -> question_id = $question -> id;
            if ($x == $req->input("correctAnswer")) {
                $answers[$x] -> isRight = 1;
            }
            else {
                $answers[$x] -> isRight = 0;
            }
            $answers[$x]->save();
        }
        $question->save();
        return redirect()->action([\App\Http\Controllers\QuestionController::class, 'index']);
    }

    public function resultPost(Request $req) {
        $answers = $req->except(('_token'));
        $correctAnswers = 0;
        $answersCount = count(Question::all());
        foreach($answers as $key => $value) {
            if(Answer::find((int)$value)->isRight) {
                $correctAnswers++;
            }
        }
        return view("question.result")->with("result", "{$correctAnswers}/{$answersCount}");
    }
}
