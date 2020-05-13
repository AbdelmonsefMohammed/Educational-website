@extends('layouts.user_layout')
@section('frontendcontent')

    <!-- ================ start banner Area ================= -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                        My Courses
                    </h1>
                    <p class="mx-auto text-white  mt-20 mb-40">

                    </p>
                    <div class="link-nav">
                        <span class="box">
                            <a href="/">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a href="/mycourses">MyCourses </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End banner Area ================= -->

    <!-- Start courses Area -->
	<section class="post-content-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
                    @foreach ($user_courses as $course)
                    
                        <div class="single-post row">
                            <div class="col-lg-3  col-md-3 meta-details">
                                <ul class="tags">
                                    <li>Track Name : <a href="/track/{{ $course->track->name }}">{{$course->track->name}}</a></li>
                                </ul>
                                <div class="user-details row">
                                    <p class="date col-lg-12 col-md-12 col-6"><a=>{{$course->created_at->diffForHumans()}}</a> <span class="lnr lnr-calendar-full"></span></p>
                                    <p class="view col-lg-12 col-md-12 col-6"><a>{{count($course->users)}} enrolls</a> <span class="lnr lnr-eye"></span></p>
                                    <p class="view col-lg-12 col-md-12 col-12 value {{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 ">
                                <div class="feature-img">
                                    @if($course->photo)
                                    <img height="252" class="" src="{{asset('images')}}/{{$course->photo->filename}}" alt="Card image cap">
                                    {{-- delete at production --}}
                                    @else 
                                    <img height="252" class="" src="{{ asset('images') }}/default.jpg" alt="Card image cap">
                                    @endif 
                                </div>
                                <a class="posts-title" href="/courses/{{$course->slug}}">
                                    <h3>{{\Str::limit($course->title , 40)}}</h3>
                                </a>
                                <p class="excert">
                                    {{$course->description}}
                                </p>
                                <a href="/courses/{{$course->slug}}" class="genric-btn primary radius">View</a>
                            </div>
                        </div>
                    @endforeach
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form method="get" action="/search" class="search-form" action="#">
								<input placeholder="Search Course" name="q" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Course'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>

						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Popular Tracks</h4>
							<ul class="cat-list">
                                @foreach ($famous_tracks as $track)
                                
                                    <li>
                                        <a href="/track/{{ $track->name }}" class="d-flex justify-content-between">
                                            <p>{{$track->name}}</p>
                                        </a>
                                    </li>
                                @endforeach
							</ul>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End courses Area -->


@endsection