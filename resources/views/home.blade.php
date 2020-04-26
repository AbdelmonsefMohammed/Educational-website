@extends('layouts.user_layout')
@section('frontendcontent')

@include('layouts.frontend.home')
@auth
@include('layouts.frontend.homeauth')
@endauth


@endsection