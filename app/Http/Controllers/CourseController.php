<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Track;

class CourseController extends Controller
{
    public function index($slug)
    {
        $course = Course::where('slug' , $slug)->first();
        return view('/frontend/course', compact('course'));
    }
    public function enroll($slug)
    {
        $course = Course::where('slug',$slug)->first();
        $track = Track::where('id',$course->track_id)->first();
        $user = auth()->user();
        
        //enroll to track
        $user->tracks()->attach([$track->id]);
        
        //enroll to course
        $user->courses()->attach([$course->id]);

        return redirect()->back()->withStatus("Congrats You've Enrolled in" . $course->title);
    }

    public function allcourses()
    {
        $tracks = Track::paginate(6);

        return view('/frontend/allcourses',compact('tracks'));
    }
}
