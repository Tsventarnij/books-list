<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'BookList') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('authorsList')}}">Authors list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('booksList')}}">Books list</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div style="height: 5em"></div>
