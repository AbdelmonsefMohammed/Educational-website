@extends('layouts.user_layout')
@section('frontendcontent')

    <!-- ================ start banner Area ================= -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                        All Courses
                    </h1>
                    <div class="link-nav">
                        <span class="box">
                            <a href="/">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="/courses">Courses </a>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End banner Area ================= -->

<!-- ================ Start user enrollerd Courses Area ================= -->
  <section class="popular-course-area section-gap">
    <div class="container-fluid">
        @foreach($tracks as $track)
      <div class="row justify-content-center section-title">

        <div class="col-lg-12">       

            <h3>
              <a href="/track/{{ $track->name }}">
              Track name: {{$track->name}}
              </a>
            </h3>
        </div>
      </div>

      <div class="owl-carousel popuar-course-carusel">
        


        @foreach ($track->courses as $course)
        
        <div class="single-popular-course">
            <div class="thumb">
              @if ($course->image)
              <a href="/courses/{{$course->slug}}">
                <img style="height:165.75px" class="f-img img-fluid mx-auto" src="{{ asset('images') }}/{{ $course->image }}" alt="" />
              </a>
              @else
              <a href="/courses/{{$course->slug}}">
                <img style="height:165.75px" class="f-img img-fluid mx-auto" src="{{ asset('images') }}/default.jpg" alt="" />
              </a>
              @endif
            </div>
            <div class="details">

              <a href="/courses/{{$course->slug}}">
                <h5 title="{{$course->title}}">{{\Str::limit($course->title,20)}}</h5>
              </a>
            </div>
        </div>
        @endforeach
        

        
      </div>
      @endforeach
      <div>
        <nav class="d-flex justify-content-center" aria-label="...">
          {{$tracks->links()}}
        </nav>
    </div>

    </div>
  </section>
  <!-- ================ End user enrollerd Courses Area ================= -->

  @endsection