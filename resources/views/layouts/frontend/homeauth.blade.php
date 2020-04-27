  <!-- ================ Start user enrollerd Courses Area ================= -->
  <section class="popular-course-area section-gap">
    <div class="container-fluid">
      <div class="row justify-content-center section-title">
        <div class="col-lg-12">       
            <h2>
              Welcome back,<br /> {{$username}}
            </h2>
            <h3>
              Ready to jump back in? <a href="#">My courses</a>
            </h3>
        </div>
      </div>

      <div class="owl-carousel popuar-course-carusel">
        
        @auth

        @foreach ($user_courses as $course)
        
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
                <p class="name">{{$course->track->name}}</p>
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
    </div>
  </section>
  <!-- ================ End user enrollerd Courses Area ================= -->

    <!-- ================ Start Free Courses  Area ================= -->
    <section class="video-area section-gap-bottom">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <div class="section-title text-white">
              <h2 class="text-white">
                Check Out <br>
                Our Top Free Courses
              </h2>
              <p>
                In the history of modern astronomy, there is probably no one greater leap forward than the building and
                launch of the space telescope known as the Hubble.
              </p>
            </div>
          </div>
          <div class="offset-lg-1 col-md-6 video-left">
            <div class="owl-carousel video-carousel">

              @foreach ($free_courses as $freecourse)
                
              <div><a href="#">
                  @if ($freecourse->photo)
                  <a href="/courses/{{$freecourse->slug}}">
                  <img style="height:369px" class="img-fluid" src="/images/{{ $freecourse->photo->filename }}" alt="" />
                  </a>
                @else
                <a href="/courses/{{$freecourse->slug}}">
                  <img style="height:369px" class="img-fluid" src="{{ asset('frontend') }}/img/popular-course/p3.jpg" alt="" />
                </a>
                @endif
                <a href="/courses/{{$freecourse->slug}}">
                <h4 class="text-white mb-20 mt-30"><strong class="text-warning">Course Name : </strong><a class="text-white" href="/courses/{{$freecourse->slug}}"> {{$freecourse->title}}</a></h4>
                </a>
                <h5 class="text-white mb-20 mt-30"><strong class="text-warning">Category Name : </strong><a class="text-white" href="#"> {{$freecourse->track->name}}</a></h5>
              </a>
              </div>
              @endforeach
  
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ End Free Courses Area ================= -->

    <!-- ================ Start Popular Course Area ================= -->
  <section class="popular-course-area section-gap">
    <div class="container-fluid">
      <div class="row justify-content-center section-title">
        <div class="col-lg-12">       
          <h2>
            Popular Courses <br />
            Available Right Now
          </h2>
          <p>
            Choose from our awsome online video courses with new additions published every month just for you . <span><a href="#">View More</a></span>
          </p>
        </div>
      </div>

      <div class="owl-carousel popuar-course-carusel">
        
        @auth

        @foreach ($suggested_courses as $course)
        
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
                <a href="#"><p class="name">{{$course->track->name}}</p></a>
                <p class="value {{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free' : 'Paid'}}</p>
              </div>
              <a href="/courses/{{$course->slug}}">
                <h5 title="{{$course->title}}">{{\Str::limit($course->title,20)}}</h5>
              </a>
              <div class="bottom d-flex mt-15">
                <ul class="list">
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star"></i></a>
                  </li>
                </ul>
                <p class="ml-20">{{count($course->users)}} Enrolled</p>
              </div>
            </div>
        </div>
        @endforeach
        
        @endauth
        
      </div>
    </div>
  </section>
  <!-- ================ End Popular Course Area ================= -->

  	<!-- Start top-category-widget Area -->
	<section class="top-category-widget-area pt-90 pb-90 ">
		<div class="container">
      <h2>Popular Tracks</h2>
      <?php $i = 0; ?>
      @foreach ($tracks as $track)
          
      
      <h4 class="mb-3 mt-4">Featured courses in : <a href="#">{{$track->name}}</a></h4>
			<div class="row">
        @foreach ($track->courses()->orderBy('created_at' ,'desc')->limit(3)->get() as $course)
            
				<div class="col-lg-4 col-md-6">
					<div class="single-cat-widget">
						<div class="content relative">
							<div class="overlay overlay-bg"></div>
							<a href="#" target="_blank">
								<div class="thumb">
                  @if ($course->photo)
                  <img style="height:250px" class="content-image img-fluid d-block mx-auto" src="/images/{{ $course->photo->filename }}" alt="">
                  @else
                  <img style="height:250px" class="content-image img-fluid d-block mx-auto" src="{{ asset('frontend') }}/img/popular-course/p3.jpg" alt="">
                  @endif
                </div>
                <a href="/courses/{{$course->slug}}">
								<div class="content-details">
									<h5 class="content-title mx-auto text-uppercase text-white">{{$course->created_at >= Carbon\Carbon::now()->submonth(1) ? 'New Course' : 'Legacy Course'}}</h5>
									<span></span>
                  <p class="text-warning">{{\Str::limit($course->title, 30)}}</p>
                  <p>Entrolled By: {{count($course->users)}} users</p>
                </div>
              </a>
							</a>
						</div>
					</div>
        </div>
        @endforeach
      </div>

      @if($i == 0)

        <div class="famous-tracks">
          
          <h4>Recommended Courses for you:</h4>
              <div class="row text-center justify-content-center mt-3">
                @foreach($recommended_courses as $course)
                <div title="{{$course->title}}" class="col-lg-2 col-md-3 col-xs-6  tracks"><a class="btn track-name" href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 20)}}</a></div>
                @endforeach
              </div>
        </div>
      @endif
        @if($i == 1)

        <div class="famous-tracks">
          
          <h4>Popular topics for you :</h4>
              <div class="row text-center justify-content-center mt-3">
                @foreach($famous_tracks as $famous_track)
                <div class="col-lg-2 col-md-3 col-xs-6  tracks"><a class="btn track-name" href="#">{{ $famous_track->name }}</a></div>
                @endforeach
              </div>
        </div>

      @endif
      <?php $i++; ?>
      @endforeach
		</div>
	</section>
  <!-- End top-category-widget Area -->
  


  