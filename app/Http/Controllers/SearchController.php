<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Track;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;
        $courses = Course::where('title','LIKE','%'.$q.'%')->get();

        
        //famous tracks

        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);
        $famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count','desc')->get();
        
        return view('/frontend/search',compact('courses','q','famous_tracks'));
    }
}
