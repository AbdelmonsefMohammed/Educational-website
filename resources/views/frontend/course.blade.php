@extends('layouts.user_layout')
@section('frontendcontent')

    <!-- ================ start banner Area ================= -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                        Course Title
                    </h1>
                    <p class="mx-auto text-white  mt-20 mb-40">
                        {{$course->title}}
                    </p>
                    <div class="link-nav">
                        <span class="box">
                            <a href="/">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="courses.html">Courses </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="/courses/{{$course->slug}}">Course Details</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End banner Area ================= -->
        <!--================ Start Course Details Area =================-->
        <section class="course-details-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 course-details-left">
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="main-image">
                            @if ($course->photo)
                            <img style="width:730px;height:340px" class="img-fluid" src="/images/{{ $course->photo->filename }}" alt="">
                            @else
                            <img style="width:730px;height:340px" class="img-fluid" src="{{ asset('frontend') }}/img/popular-course/p3.jpg" alt="">
                            @endif
                        </div>
                        <div class="content-wrapper">
                            <h4 class="title">Description</h4>
                            <div class="content">
                                {{$course->description}}
                            </div>
    
    
                            <h4 class="title">Course Videos</h4>
                            <div class="content">
                                @if (count($course->videos) > 0)
                                <ul class="course-list">
                                    @foreach ($course->videos as $video)
                                        

                                    <li class="justify-content-between d-flex">
                                        <p>{{$video->title}}</p>
                                        <a class="btn text-uppercase play-btn" href="{{$video->link}}"> Watch Video</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No videos yet</p>
                                @endif
                            </div>

                            <h4 class="title">Course Quizzes</h4>
                            <div class="content">
                                @if (count($course->quizzes) > 0)
                                <ul class="course-list">
                                    @foreach ($course->quizzes as $quiz)
                                        

                                    <li class="justify-content-between d-flex">
                                        <p>{{$quiz->name}}</p>
                                        
                                        <a target="_blank" href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" class="btn text-uppercase">Start Quiz</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No quizzes yet</p>
                                @endif
                            </div>
                        </div>
                    </div>
    
    
                    <div class="col-lg-4 right-contents">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Track Name</p>
                                    <span class="or">{{$course->track->name}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Course Fee </p>
                                    <span class="{{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Enrolled By </p>
                                    <span>{{count($course->users)}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>Schedule </p>
                                    <span>2.00 pm to 4.00 pm</span>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="btn text-uppercase enroll">Enroll the course</a>
    
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Course Details Area =================-->

@endsection