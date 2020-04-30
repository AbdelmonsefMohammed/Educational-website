@extends('layouts.user_layout')
@section('frontendcontent')

    <!-- ================ start banner Area ================= -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                        Quiz for
                    </h1>
                    <p class="mx-auto text-white  mt-20 mb-40">
                        {{$quiz->course->title}}
                    </p>
                    <div class="link-nav">
                        <span class="box">
                            <a href="/">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="courses.html">Courses </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="/courses/{{$course->slug}}">Course Details</a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="/courses/{{$course->slug}}/quizzes/{{$quiz->name}}">Quiz</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End banner Area ================= -->
        <!--================ Start Course Details Area =================-->
        <section class="course-details-area mb-10">
            <div class="container">
               <h2>{{$quiz->name}}</h2> 
               <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
               <form action="/courses/{{$quiz->course->slug}}/quizzes/{{$quiz->name}}" method="POST" autocomplete="off">
                @csrf
                <?php $counter = 1; ?>
                @foreach ($quiz->questions as $question)
                    <div class="form-group mt-3 mb-3">
                        <label style="color:black" for="answer"><strong style="font-weight:bold"> Q{{$counter}} : </strong>{{$question->title}} ({{$question->score}} Points)</label>
                        @if ($question->type == 'text')
                            <input type="text" name="answer{{$question->id}}" required class="single-input" placeholder="Your answer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your answer'">
                        @else
                        <?php $answers = explode('.' ,rtrim($question->answers , '.')); ?>
                            @foreach ($answers as $answer)
                            <div class="radio">
                                <label><input type="radio" value="{{$answer}}" name="answer{{$question->id}}"> {{$answer}}</label>
                            </div>
                            @endforeach
                            
                        @endif
                    </div> <hr>
                    <?php $counter++ ?>
                @endforeach
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>

            </div>
        </section>
        <!--================ End Course Details Area =================-->

@endsection