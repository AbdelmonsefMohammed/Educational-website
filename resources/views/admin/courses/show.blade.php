@extends('layouts.app', ['title' => __('Course Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Review Course')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Course Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="course-image">
                                    @if($course->image)
                                    <img src="{{asset('images')}}/{{$course->image}}" alt="" class="img-fluid">
                                    @else
                                    <img class="card-img-top" src="{{ asset('images') }}/default.jpg" alt="Card image cap">
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3>Course title: {{$course->title}}</h3>
                                <h3>Track Name:<a href="{{ route('tracks.show' , $course->track->id) }}"> {{$course->track->name}}</a></h3>
                                <span class="{{$course->status == 0 ? 'text-success' : 'text-danger'}}">{{$course->status == 0 ? 'Free': 'Paid'}}</span>
                                <p><strong>Description :</strong> {{$course->description}}</p>
                            </div>
                        </div>
                    </div>
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

                    @include('includes.errors')
                    
                    <div class="table-responsive">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Videos') }}</h3>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="/admin/courses/{{$course->id}}/videos/create" class="btn btn-sm btn-primary">{{ __('Add Video') }}</a>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="/admin/courses/{{$course->id}}/quizzes/create" class="btn btn-sm btn-primary">{{ __('Add Quiz') }}</a>
                                </div>
                            </div>
                        </div>
                        @if(count($course->videos))
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($course->videos as $video)
                                    <tr>
                                        <td title="{{$video->title}}"><a href="{{ route('videos.show', $video->id) }}">{{ \Str::limit($video->title , 40) }}</a></td>
                                        <td>{{ $video->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('videos.destroy', $video) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('videos.edit', $video) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                        <p class="text-center lead">There is no videos</p>  
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection