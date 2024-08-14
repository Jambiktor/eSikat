<nav class="navbar navbar-expand-lg bg-body-tertiary d-flex align-items-center ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('layout.landing')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex flex-row-reverse " id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex ">
                <span class="navbar-text">@auth{{auth()->user()->name}}@endauth</span>
                @auth
                <a class="nav-link" href="{{route('diary')}}">Diary</a>
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
                @else
                <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                <a class="nav-link" href="{{route('registration')}}">Registration</a>
                @endauth

            </div>
        </div>
    </div>
</nav>