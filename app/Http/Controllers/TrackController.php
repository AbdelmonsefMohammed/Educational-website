<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class TrackController extends Controller
{
    public function index($name)
    {
        $courses = Track::where('name',$name)->first()->courses;

        return view('track_courses',compact('courses'));
    }
}
