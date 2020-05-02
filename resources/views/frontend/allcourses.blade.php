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
              Track name: {{$track->name}}
            </h3>
        </div>
      </div>

      <div class="owl-carousel popuar-course-carusel">
        
        @auth

        @foreach ($track->courses as $course)
        
        <div class="single-popular-course">
            <div class="thumb">
              @if ($course->photo)
              <a href="/courses/{{$course->slug}}">
                <img style="height:165.75px" class="f-img img-fluid mx-auto" src="/images/{{ $course->photo->filename }}" alt="" />
              </a>
              @else
              <a href="/courses/{{$course->slug}}">
                <img style="height:165.75px" class="f-img img-fluid mx-auto" src="{{ asset('frontend') }}/img/popular-course/p3.jpg" alt="" />
              </a>
              @endif
            </div>
            <div class="details">
              <div class="d-flex justify-content-between mb-20">
                <a href="#">
                <p class="name">{{$track->name}}</p>
                </a>
              </div>
              <a href="/courses/{{$course->slug}}">
                <h5 title="{{$course->title}}">{{\Str::limit($course->title,20)}}</h5>
              </a>
            </div>
        </div>
        @endforeach
        
        @endauth
        
      </div>
      @endforeach
      {{$tracks->links()}}
    </div>
  </section>
  <!-- ================ End user enrollerd Courses Area ================= -->

  @endsection