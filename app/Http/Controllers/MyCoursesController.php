<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Course;
use App\Track;

class MyCoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_courses = User::findOrFail(Auth::user()->id)->courses;

        //famous tracks

        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
        $famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count','desc')->get();
        

        return view('/frontend/mycourses',compact('user_courses','famous_tracks'));
    }
}
