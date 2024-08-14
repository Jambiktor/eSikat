@extends("layout.home")
@section("title", "login")
@section("content")
<div class="container-fluid w-50 mt-5">
    <div>
        @if($errors->any())
        <div class="col-12">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
    </div>
    <div class="d-flex align-items-center justify-content-center border border-dark p-5 rounded">
        <form class="row g-3" method="POST" action="{{route('login.post')}}">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
</div>
@endsection