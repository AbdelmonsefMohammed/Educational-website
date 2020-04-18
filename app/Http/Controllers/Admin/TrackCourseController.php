<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Track;
use App\Course;
use App\Photo;

class TrackCourseController extends Controller
{

    public function create(Track $track)
    {
        return view('admin.tracks.createcourse',compact('track'));
    }

    public function store(Request $request , Track $track)
    {
        $rules = [
            'title'    => 'required|min:20|max:120',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
            'track_id' => 'required|integer',
            'image'    => 'required|image'
        ];
        $this->validate($request, $rules);
        $course = Course::create($request->all());
 
        if($course)
        {    
            if($file = $request->file('image'))
            {
               $filename = $file->getClientOriginalName();
               $filenewname = time() . '_' . $filename;
               
               if($file->move('images' , $filenewname))
               {
                   Photo::create([
                       'filename'  => $filenewname,
                       'photoable_id' => $course->id,
                       'photoable_type' => 'App\Course',
                   ]);
               }
 
            }
            
            return redirect('/admin/tracks/' . $track->id)->withStatus('Course successfully created');
        }
    }


}
