@extends('layouts.user_layout')
@section('frontendcontent')

    <!-- ================ start banner Area ================= -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12 banner-right">
                    <h1 class="text-white">
                        Search for
                    </h1>
                    <p class="mx-auto text-white  mt-20 mb-40">
                        {{$q}}
                    </p>
                    <div class="link-nav">
                        <span class="box">
                            <a href="/">Home </a>
                            <i class="lnr lnr-arrow-right"></i>
                            <a>Related Courses</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ End banner Area ================= -->
    
    	<!-- Start courses Area -->
	<section class="post-content-area">
		<div class="container">
            <h3 class="text-heading"><?php echo count($courses);?> records matchs "{{$q}}"</h3>
			<div class="row">
				<div class="col-lg-8 posts-list">
                    @foreach ($courses as $course)
                    
                        <div class="single-post row">
                            <div class="col-lg-3  col-md-3 meta-details">
                                <ul class="tags">
                                    <li><a href="#">Category:{{$course->track->name}}</a></li>
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
                                    <img height="252" class="" src="/images/{{$course->photo->filename}}" alt="Card image cap">
                                    {{-- delete at production --}}
                                    @else 
                                    <img height="252" class="" src="/images/1.jpg" alt="Card image cap">
                                    @endif 
                                </div>
                                <a class="posts-title" href="/courses/{{$course->slug}}">
                                    <h3>{{\Str::limit($course->title , 40)}}</h3>
                                </a>
                                <p class="excert">
                                    {{$course->description}}
                                </p>
                                <a href="/courses/{{$course->slug}}" class="genric-btn primary radius">View More</a>
                            </div>
                        </div>
                    @endforeach
				</div>
				<div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form method="get" action="/search" class="search-form" action="#">
								<input placeholder="Search Posts" name="q" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Popular Posts</h4>
							<div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Space The Final Frontier</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp2.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>The Amazing Hubble</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp3.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Astronomy Or Astrology</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp4.jpg" alt="">
									</div>
									<div class="details">
										<a href="s">
											<h6>Asteroids telescope</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div>
						</div>
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
						</div>


					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End courses Area -->

@endsection