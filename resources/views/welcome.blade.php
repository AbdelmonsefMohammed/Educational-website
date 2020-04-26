@extends('layouts.user_layout')
@section('frontendcontent')

@include('layouts.frontend.home')
@guest
@include('layouts.frontend.homeguest')
@endguest




@endsection