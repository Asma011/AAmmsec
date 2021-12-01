<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aammsecurities</title>
    <link rel="icon" href="{{ URL::to('assets/admin/images/favicon.png')}}">
    <link href="{{ URL::to('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/admin/css/LineIcons.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/admin/css/viewer.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/admin/css/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/admin/css/calendar.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::to('assets/admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/admin/css/responsive.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="assets/admin/js/jquery.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://unpkg.com/feather-icons@4.10.0/dist/feather.min.js"></script>    
<link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<style type="text/css">
    .error{
            
        color: red;
    }
    .sidemenu-area .sidemenu .navbar-nav .active {
         background: #C0977E;
        color: #ffffff;
    }
    .dropdown .feather{
        height: 15px;
    }
    .hover_dropdown .dropbtn,.hover_dropdown .dropdown-content a {
        background-color:#fff;
        padding: 8px 1rem !important;
        font-weight: 300;
        overflow: hidden;
        position: relative;
        color: #686c71;
        border-radius: 0;
            font-size: 13px !important;
            border:none;
                width: 100%;
        text-align: left;
    }

    .hover_dropdown .dropbtn:hover,.hover_dropdown .dropbtn.active,.hover_dropdown .dropdown-content a:hover,.hover_dropdown .dropdown-content a.active{
        background: #eef5f9;
    color: #c37cc6;
    }
/* The container <div> - needed to position the dropdown content */
    .hover_dropdown.dropdown {
        position: relative;
        display: inline-block;
    }

/* Dropdown Content (Hidden by Default) */
    .hover_dropdown .dropdown-content {
        display: none;
        background-color: #fff;
        width:100%;
        z-index: 1;
    }
    .tabs-style-two{
        background-color: #fff;
        margin-bottom: 5px !important;
    }
    .tabs-style-two ul{
        border:none;
    }

/* Links inside the dropdown */
    .hover_dropdown .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    

/* Change color of dropdown links on hover */
    .hover_dropdown .dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
    .hover_dropdown.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
    .hover_dropdown.dropdown:hover .dropbtn {background-color: #eef5f9;}
</style>
@yield('styles')
</head>
<body>
    @include('partials.aheader')
    @yield('contents')
    @include('partials.afooter');
    @yield('scripts')
</body>
</html>