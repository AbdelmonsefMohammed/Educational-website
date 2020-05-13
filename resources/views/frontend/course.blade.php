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
                            <a href="/courses">Courses </a>
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
                            <img style="width:730px;height:340px" class="img-fluid" src="{{asset('images')}}/{{ $course->photo->filename }}" alt="">
                            @else
                            <img style="width:730px;height:340px" class="img-fluid" src="{{ asset('images') }}/default.jpg" alt="">
                            @endif
                        </div>
                        <div class="content-wrapper">
                            <h4 class="title">Description</h4>
                            <div class="content">
                                {{$course->description}}
                            </div>
    
                            @auth
                                
                            
                            <h4 class="title">Course Videos</h4>
                            <div class="content">
                                @if (count($course->videos) > 0)
                                <ul class="course-list">
                                    @foreach ($course->videos as $video)
                                        

                                    <li class="justify-content-between d-flex">
                                        <p>{{$video->title}}</p>
                                        <a class="btn text-uppercase play-btn {{count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0 ? '':'disabled'}}" href="{{$video->link}}"> Watch Video</a>
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
                                        
                                        <a target="_blank" href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}" class="btn text-uppercase {{count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0 ? '':'disabled'}}">Start Quiz</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p>No quizzes yet</p>
                                @endif
                            </div>
                            @endauth
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
                                    <p>Created at </p>
                                    <span>{{$course->created_at->diffForHumans()}}</span>
                                </a>
                            </li>
                        </ul>
                        @guest
                            <form method="POST" action="/courses/{{$course->slug}}">
                                @csrf
                                <input name="enroll" class="btn text-uppercase enroll" type="submit" value="Enroll the course">
                            </form>
                        @endguest
                        @auth
                        @if (count(auth()->user()->courses()->where('slug',$course->slug)->get()) > 0)
                            <a class="btn text-uppercase enroll">Enrolled</a>
                        @else
                            <form method="POST" action="/courses/{{$course->slug}}">
                                @csrf
                                <input name="enroll" class="btn text-uppercase enroll" type="submit" value="Enroll the course">
                            </form>
                        @endif
                        @endauth

                        
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Course Details Area =================-->

@endsection