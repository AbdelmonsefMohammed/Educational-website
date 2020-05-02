<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Quiz;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($slug , $name)
    {
        $course = Course::where('slug' , $slug)->first();
        $quiz = $course->quizzes()->where('name',$name)->first();
        return view('/frontend/quiz',compact('quiz','course'));
    }


    public function submit($slug ,$name, Request $request)
    {
        $quiz = Quiz::where('name',$name)->first();
        $questions = $quiz->questions;
        $question_ids = [];
        $questions_right_answers = [];
        $quiz_score = 0;
        foreach ($questions as $question) {
            $question_ids[] = $question->id;
            $questions_right_answers[] = $question->right_answer;
            $quiz_score += $question->score;
        }
        for($i=0;$i<count($question_ids);$i++)
        {
            $your_answer =trim($request['answer'.$question_ids[$i]]);

            $the_answer = trim($questions_right_answers[$i]);

            if($your_answer != $the_answer){
                return redirect()->back()->withStatus("Your answer {$your_answer} is not correct");
            }
        }
        //attach user with the quiz
        $user = auth()->user();
        $user->quizzes()->attach([$quiz->id]);

        //increment the user score
        $user->score +=$quiz_score;
        if($user->save())
        {

            return redirect("/courses/".$quiz->course->slug)->withStatus("Good job you have completed the quiz successfully you erned".$quiz_score."points");
        }
    }    
}
