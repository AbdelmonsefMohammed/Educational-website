@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Courses') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">{{ __('Add Course') }}</a>
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
                    @if(count($courses))
                    <div class="row ml-3">
                        
                            @foreach ($courses as $course)
                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6">
                            <div class="card mb-3" style="width: 18rem;">
                                @if($course->image)
                                <img height="190" class="card-img-top" src="{{asset('images')}}/{{$course->image}}" alt="Card image cap">
                                {{-- delete at production --}}
                                @else 
                                <img height="190" class="card-img-top" src="{{ asset('images') }}/default.jpg" alt="Card image cap">
                                @endif 
                               <div class="card-body text-center">
                                <h5 class="card-title">{{\Str::limit($course->title , 30)}}</h5>
                                <form method="POST" action="{{ route('courses.destroy' , $course) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('courses.show' , $course) }}" class="btn btn-success btn-sm">Show</a>
                                <a href="{{ route('courses.edit' , $course) }}" class="btn btn-primary btn-sm">Edit</a>

                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="delete">
                                </form>
                                </div>
                            </div>
                            </div>
                             @endforeach

                        
                    </div>

                    @else
                        <p class="text-center lead">There is no Courses</p>  
                        
                    </div>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $courses->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection