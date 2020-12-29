<header>
    <div class="row container-h">
        <div class="col-md-3 d-flex">
            <img class="logo align-self-center" src="{{ asset('/images/todo_logo.jpg') }}" alt="logo"/>
        </div>
        <div class="col-md-6 d-flex flex-column">
            <div class="site-title d-flex align-self-center">{{$title}}</div>
        </div>
        <div class="col-md-3 d-flex align-self-center">
            <a href="{{ route('jobs.calendar') }}" class="btn btn-sm btn-header me-1" role="button">Logowanie</a>
            <a href="{{ route('jobs.list') }}" class="btn btn-sm btn-header" role="button">Rejestracja</a>
        </div>
    </div>
</header>
