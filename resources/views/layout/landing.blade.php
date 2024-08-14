@extends("layout.home")
@section('title', 'Landing Page')
@section("content")

@php
use App\Models\Diaries;
$diaries = Diaries::all();
@endphp


<div class="w-50">
    <h1 class="ps-2">Dear, @auth{{auth()->user()->name}}@endauth</h1>
</div>

<div class="contianer-fluid ">
    <div class="row gx-0">
        @foreach ($diaries as $notion)
        <div class="col-6 d-flex justify-content-center">
            <div class="card w-75 mb-3">
                <div class="card-body">
                    <h5 class="card-title"> @auth{{auth()->user()->name}}@endauth</h5>
                    <p class="card-text">{{$notion->notion}}</p>
                    <a href="{{route('layout.edit', ['notion' => $notion])}}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection