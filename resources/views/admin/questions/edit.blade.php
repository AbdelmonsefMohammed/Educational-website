@extends('layouts.app', ['title' => __('Question Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Question')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Question Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('questions.update',$question) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <h6 class="heading-small text-muted mb-4">{{ __('Question information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Question Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Quiz Title') }}" value="{{ $question->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('answers') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-answers">{{ __('Question answers') }}</label>
                                    <textarea name="answers" id="input-answers" class="form-control form-control-alternative{{ $errors->has('answers') ? ' is-invalid' : '' }}" placeholder="{{ __('Question answers') }}" required autofocus>{{ $question->answers }}</textarea>

                                    @if ($errors->has('answers'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('answers') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-right_answer">{{ __('Right answer') }}</label>
                                    <input type="text" name="right_answer" id="input-right_answer" class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" placeholder="{{ __('Question right answer') }}" value="{{ $question->right_answer }}" required autofocus>

                                    @if ($errors->has('right_answer'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('right_answer') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-score">{{ __('Score') }}</label>
                                    <select name="score" id="input-score" required class="form-control">
                                        <option <?php if($question->score == 1) echo 'selected'; ?> value="1">1</option>
                                        <option <?php if($question->score == 5) echo 'selected'; ?> value="5">5</option>
                                        <option <?php if($question->score == 10) echo 'selected'; ?> value="10">10</option>
                                        <option <?php if($question->score == 15) echo 'selected'; ?> value="15">15</option>
                                        <option <?php if($question->score == 20) echo 'selected'; ?> value="20">20</option>

                                    </select>

                                    @if ($errors->has('score'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('score') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-type">{{ __('Type') }}</label>
                                    <select name="type" id="input-type" required class="form-control">
                                        <option <?php if($question->type == 'text') echo 'selected'; ?> value="text">text</option>
                                        <option <?php if($question->type == 'checkbox') echo 'selected'; ?> value="checkbox">checkbox</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-quiz_id">{{ __('Quiz') }}</label>
                                    <select name="quiz_id" id="input-quiz_id" required class="form-control">
                                        <option value="{{$question->quiz_id}}">{{\Str::limit($question->quiz->name , 40)}}</option>
                                    </select>

                                    @if ($errors->has('quiz_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quiz_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection