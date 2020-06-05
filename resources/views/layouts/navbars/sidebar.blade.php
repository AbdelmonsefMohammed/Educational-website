<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images') }}/e_learning.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('images') }}/{{auth()->user()->photo}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images') }}/e_learning.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if(strtolower(auth()->user()->email) == "monsef@gmail.com")
                <li class="nav-item">
                    <a class="nav-link active" href="#nav-admin" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="nav-admin">
                        <i class="fas fa-user-secret" style="color: #f4645f;"></i>
                        <span class="nav-link-text">{{ __('Admins') }}</span>
                    </a>

                    <div class="collapse show" id="nav-admin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('Admin profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.index') }}">
                                    {{ __('Admin Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link active" href="#nav-users" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="nav-users">
                        <i class="fas fa-users" style="color: #f4645f;"></i>
                        <span class="nav-link-text">{{ __('Users') }}</span>
                    </a>

                    <div class="collapse" id="nav-users">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.create') }}">
                                    {{ __('New User') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('tracks.index') }}">
                        <i class="fas fa-chart-bar text-warning"></i> {{ __('Tracks') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('courses.index') }}">
                        <i class="fas fa-chalkboard-teacher text-warning"></i> {{ __('Courses') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('videos.index') }}">
                        <i class="fab fa-youtube text-warning"></i> {{ __('Videos') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('quizzes.index') }}">
                        <i class="far fa-edit text-warning"></i> {{ __('Quizzes') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('questions.index') }}">
                        <i class="far fa-question-circle text-warning"></i> {{ __('Questions') }}
                    </a>
                </li>

            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            
        </div>
    </div>
</nav>