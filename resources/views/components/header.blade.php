<header>
    <div class="row container-h">
        <div class="col-md-3 d-flex">
            <img class="logo align-self-center" src="{{ asset('/images/todo_logo.jpg') }}" alt="logo"/>
        </div>
        <div class="col-md-6 d-flex flex-column">
            <div class="site-title d-flex align-self-center">{{ $title }}</div>
        </div>
        <div class="col-md-3 d-flex align-self-center">
            <a href="#" class="btn btn-sm btn-header me-1" role="button">@lang('general.Log in')</a>
            <a href="#" class="btn btn-sm btn-header" role="button">@lang('general.Register')</a>
        </div>
    </div>
</header>
