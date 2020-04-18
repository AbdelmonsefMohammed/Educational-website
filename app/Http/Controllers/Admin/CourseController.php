<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Photo;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('id','desc')->paginate(15);
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
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
           
           return redirect('/admin/courses')->withStatus('Course successfully created');
       }
    }


    public function show(Course $course)
    {
        return view('admin.courses.show' , compact('course'));
    }


    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $rules = [
            'title'    => 'required|min:20|max:120',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
            'track_id' => 'required|integer',
            'image'    => 'image'
        ];
        $this->validate($request, $rules);
        $course->update($request->all());
 
        if($course)
        {    
            if($file = $request->file('image'))
            {
               $filename = $file->getClientOriginalName();
               $filenewname = time() . '_' . $filename;
               
               if($file->move('images' , $filenewname))
               {    
                   if($course->photo){
                   $photo = $course->photo;

                   //remove old photo
                   $filename = $photo->filename;
                   unlink('images/' . $filename);

                   $photo->filename = $filenewname;
                   $photo->save();
                   }else{
                    Photo::create([
                        'filename'  => $filenewname,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Course',
                    ]);
                   }
               }
 
            }
            
            return redirect('/admin/courses')->withStatus('Course successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if($course->photo)
        {
        $filename = $course->photo->filename;
        unlink('images/' . $filename);
        }
        $course->photo->delete();
        
        $course->delete();
        return redirect('/admin/courses')->withStatus('Course successfully deleted');
    }
}
