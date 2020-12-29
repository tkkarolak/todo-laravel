<html>

    @include('components.head')

    <body>

        @include('components.header')

        @yield('content')

        @include('components.footer')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>

</html>
