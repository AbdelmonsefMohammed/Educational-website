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
           'description'    => 'required|min:20|max:1000',
           'status'   => 'required|integer|in:0,1',
           'link'     => 'required|url',
           'track_id' => 'required|integer',
           'pic'    => 'required|image'
       ];
       $this->validate($request, $rules);
       
       $slug = strtolower(str_replace(' ','-',$request['title']));
       $request->request->add(['slug' => $slug]);
       
       if($file = $request->file('pic'))
       {
          $filename = $file->getClientOriginalName();

          $filenewname = time() . '_' . $filename;

          if($file->move(public_path('images') , $filenewname))
          {
            $request->request->add(['image' => $filenewname]);
          }

       }
       $course = Course::create($request->all());


           return redirect('/admin/courses')->withStatus('Course successfully created');

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
            'description'    => 'required|min:20|max:1000',
            'status'   => 'required|integer|in:0,1',
            'link'     => 'required|url',
            'track_id' => 'required|integer',
            'pic'    => 'image'
        ];
        $this->validate($request, $rules);
        $slug = strtolower(str_replace(' ','-',$request['title']));
        $request->request->add(['slug' => $slug]);

        if($file = $request->file('pic'))
        {
           $filename = $file->getClientOriginalName();
           $filenewname = time() . '_' . $filename;
           
           if($file->move(public_path('images') , $filenewname))
           {    
               if($course->image){       
               //remove old photo
               unlink('images/' . $course->image);
               $request->request->add(['image' => $filenewname]);

               }else{
               $request->request->add(['image' => $filenewname]);
               }
           }

        }
        if($course->update($request->all()))
        {    
            return redirect('/admin/courses')->withStatus('Course successfully updated');
        }else{
            return redirect('/admin/courses/' . $course->id , '/edit')->withStatus('Something went wrong');
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
        if($course->image)
        {
        $filename = $course->image;
        unlink('images/' . $filename);
        }       
        $course->delete();
        return redirect('/admin/courses')->withStatus('Course successfully deleted');
    }
}

