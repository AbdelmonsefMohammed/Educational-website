<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Track;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        $free_courses = Course::where('status',0)->get()->random(5);
        $tracks = Track::with('courses')->orderBy('id','desc')->limit(5)->get();

        //famous tracks

        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
        $famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count','desc')->get();




        if(Auth::user())
        {
            $user_courses_ids = Auth::user()->courses()->pluck('id');

            $username = Auth::user()->name;
            $user_courses = User::findOrFail(Auth::user()->id)->courses;
            $suggested_courses = Course::whereNotIn('id', $user_courses_ids)->get()->random(5);

            //recommended courses 

            $user_tracks_ids = Auth::user()->tracks()->pluck('id');
            $recommended_courses = Course::whereIn('track_id',$user_tracks_ids)->whereNotIn('id',$user_courses_ids)->limit(4)->get();

            return view('home',compact('user_courses','suggested_courses','free_courses','username','tracks','famous_tracks','recommended_courses'));
        }else{

            $guest_suggested_courses = Course::get()->random(5);

            return view('/welcome',compact('guest_suggested_courses','free_courses','tracks','famous_tracks'));
        }

    }
}
