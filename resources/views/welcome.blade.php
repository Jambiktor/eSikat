@extends("layout.home")
@section('title', 'Landing Page')
@section("content")

{{auth()->user()->name}}

@endsection