<?php
        use Carbon\Carbon;
        $tracks_count = \App\Track::all()->count();
        $courses_count = \App\Course::all()->count();
        $users_count = \App\User::where('role',0)->count();
        $quizzes_count = \App\Quiz::all()->count();


        $new_tracks = \App\Track::where('created_at','>=',Carbon::now()->submonth(1))->count();
        $tracks_rate = round(( $new_tracks / $tracks_count ) *100 , 2);

        $new_courses = \App\Course::where('created_at','>=',Carbon::now()->submonth(1))->count();
        $courses_rate = round(( $new_courses / $courses_count ) *100 , 2);

        $new_users = \App\User::where('role',0)->where('created_at','>=',Carbon::now()->submonth(1))->count();
        $users_rate = round(( $new_users / $users_count ) *100 , 2);
        

        $new_quizzes = \App\Quiz::where('created_at','>=',Carbon::now()->submonth(1))->count();
        $quizzes_rate = round(( $new_quizzes / $quizzes_count ) *100 , 2);

?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Courses</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="{{ route('courses.index') }}">{{$courses_count}} Courses</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up pr-1"></i> {{$courses_rate}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="{{ route('user.index') }}">{{$users_count}} Users</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up pr-1"></i>{{$users_rate}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Tracks</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="{{ route('tracks.index') }}">{{$tracks_count}} Tracks</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up pr-1"></i>{{$tracks_rate}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Quizzes</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="{{ route('quizzes.index') }}">{{$quizzes_count}} Quizzes</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="far fa-edit"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up pr-1"></i>{{$quizzes_rate}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>