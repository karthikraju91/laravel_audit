@include('layouts.header')
@yield('content')
        <script>
            var public_path   = '{{URL::to("/")}}';
        </script>
@include('layouts.footer')