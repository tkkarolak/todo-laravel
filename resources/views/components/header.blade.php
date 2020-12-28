<header class="container">
    <div class="row">
        <div class="col-md-3">
            <img class="logo" src="{{ asset('/images/todo_logo.jpg') }}" alt="logo"/>
        </div>
        <div class="col-md-6">
            <h1 class="site-title text-center">{{$title}}</h1>
        </div>
        <div class="d-flex align-self-center col-md-3">
            <a href="{{ route('jobs.calendar') }}" class="btn btn-sm btn-header me-1" role="button">Kalendarz</a>
            <a href="{{ route('jobs.list') }}" class="btn btn-sm btn-header" role="button">Lista</a>
        </div>
    </div>
</header>
