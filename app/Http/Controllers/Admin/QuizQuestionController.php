<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quiz;

class QuizQuestionController extends Controller
{

    public function create(Quiz $quiz)
    {
        return view('admin.quizzes.createquestion',compact('quiz'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:20|max:200',
            'answers' => 'required|min:5|max:200',
            'right_answer' => 'required|min:1|max:200',
            'score' => 'required|in:1,5,10,15,20',
            'quiz_id' => 'required|integer',
        ];
        $this->validate($request , $rules);
        if(Question::create($request->all()))
        {
            return redirect('/admin/quizzes')->withStatus('Question successfully created');
        }else{
            return redirect('/admin/questions/create')->withStatus('Something went wrong');
        }
    }


}
