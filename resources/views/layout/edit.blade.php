@extends("layout.home")
@section('title', 'Diary Page')
@section("content")

<div class="m-3 d-flex align-items-center justify-content-center flex-column">
    <div class="w-50">
        <h1>Dear, @auth{{auth()->user()->name}}@endauth</h1>
    </div>

    <div class="w-50">
        <form method="POST" action="{{route('layout.update', ['notion' => $notion])}}">
            @csrf
            @method('put')
            <div class="mb-3 ">
                <label for="exampleFormControlTextarea1" class="form-label">What's on your my today?</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="notion"
                    rows="3">{{ old('notion', $notion->notion ?? '') }}</textarea>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection