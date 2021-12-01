<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>aammsecurities | Login</title>
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
    body{
            background-color: #F5E4D5 !important;
    }
    .form-content{
        background-color: #EBC9AE !important;
    }


</style>
</head>
<body>
    <div class="preloader">
        <div class="d-table">
            <div class="d-tablecell">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="auth-main-content auth-bg-image">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="auth-box">
                    <div class="row align-items-center">
                        <div class="col-md-6" style="display: none;">
                            <div class="form-left-content">
                                <div class="auth-logo">
                                    <img src="assets/admin/images/login.d814adb7.png" alt="Logo">
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-12 pad-0 login_form">
                            <div class="form-content">
                                <div class="text-center d-none">
                                    <img src="assets/admin/images/large-logo.png" style="width:100px;">
                                </div>
                                <h1 class="heading">Log In</h1>
                                <p>Welcome back, please login to your account.</p>
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="close" data-dismiss="alert">×</span>
                                    {{ session('error') }}
                                </div>
                             @endif
                                   <div class="alert alert-danger" id="login_error_tab" style="display:none;">
                                    <a href="#" class="" data-dismiss="alert" style="float: right;margin-top: -20px;">&times;</a>
                                    <span  id="login_error_msg"></span>
                                </div>
                                <form id="loginform" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        
                                            <a class="fp-link" href="{{ route('password.request') }}">Forgot Password?</a>
                                            <p>Do not have Account? <a   href="{{ route('register') }}"> Create One</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->	
    @include('partials.afooter');
    @yield('scripts')
</body>
</html>