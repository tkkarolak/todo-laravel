<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    </head>

    <body>

        <header>
            <div class="row container-h">
                <div class="col-md-3 d-flex">
                    <img class="logo align-self-center" src="{{ asset('/images/todo_logo.jpg') }}" alt="logo"/>
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <div class="site-title d-flex align-self-center">{{ $title }}</div>
                </div>
                <div class="col-md-3 d-flex align-self-center">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-header me-1" role="button">@lang('general.Log in')</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-header" role="button">@lang('general.Register')</a>
                </div>
            </div>
        </header>
        <main>
            {{ $slot }}
        </main>

        <footer class="container-fluid">
            <div class="row d-flex justify-content-center">
                Made in tears &#x1F4A7 &#x1F4A7 &#x1F4A7 by KeresaTarolak
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
