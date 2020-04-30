<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id','desc')->paginate(20);
        return view('admin.questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:20|max:200',
            'answers' => 'required|min:5|max:200',
            'right_answer' => 'required|min:1|max:200',
            'score' => 'required|in:1,5,10,15,20',
            'type' => 'required|in:text,checkbox',
            'quiz_id' => 'required|integer',
        ];
        $this->validate($request , $rules);
        if(Question::create($request->all()))
        {
            return redirect('/admin/questions')->withStatus('Question successfully created');
        }else{
            return redirect('/admin/questions/create')->withStatus('Something went wrong');
        }
    }
    
    public function edit(Question $question)
    {
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $rules = [
            'title' => 'required|min:20|max:200',
            'answers' => 'required|min:5|max:200',
            'right_answer' => 'required|min:1|max:200',
            'score' => 'required|in:1,5,10,15,20',
            'type' => 'required|in:text,checkbox',
            'quiz_id' => 'required|integer',
        ];
        $this->validate($request , $rules);
        if($question->update($request->all()))
        {
            return redirect('/admin/questions')->withStatus('Question successfully updated');
        }else{
            return redirect('/admin/questions/'. $question->id .'/edit')->withStatus('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/admin/questions')->withStatus('Question successfully deleted');
    }
}
