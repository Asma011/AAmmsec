<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ URL::to('assets/home/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/home/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/home/css/custom.css') }}" rel="stylesheet" />
       
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,700,800" rel="stylesheet">
    <style type="text/css">
        body {
        font-family: avenir-lt-w01_35-light1475496;
        font-weight: 400;
        }
        section {
     padding: 10px 0; 
    overflow-x: hidden;
}
    </style>
    @yield('styles')

</head>
<body>
    <div class="page-holder">
     
        @include('partials.header')
       
      
     
        @yield('contents') 
        
        
        @include('partials.footer')
    </div> 
    <script src="{{ URL::to('assets/home/js/bootjs.js') }}"></script>
    <script src="{{ URL::to('assets/home/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::to('assets/home/js/jquery.js') }}"></script>
    @yield('scripts')

                            
    {{-- <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {if(I.iticks) return;I.iticks = {host:c, settings:s, clientId:k, cdn:L, queue:[]};var h = T.head || T.documentElement;var e = T.createElement(i);var l = I.location;e.async = true;e.src = (L||c)+'/client/inject-v2.min.js';h.insertBefore(e, h.firstChild);I.iticks.call = function(a, b) {I.iticks.queue.push([a, b]);};})(window, 'https://cdn.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'xFW2q2zF2qbiXssAt_c', {});
    </script> --}}
</body>
</html>