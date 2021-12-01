
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
                                <h1 class="heading">Sign Up</h1>
                                <p>No account? Create one!</p>
                                <div class="login-form">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <span class="close" data-dismiss="alert">×</span>
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            <span class="close" data-dismiss="alert">×</span>
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                                <form id="loginform" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                        name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                        name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Re-enter password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mobile number</label>
                                        <input type="number" class="form-control" id="mobile_no"  name="mobile_no" @error('mobile_no') is-invalid @enderror" name="mobile_no" required autocomplete="Mobile_no">
                                        @error('mobile_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Sign Up">
                                            <a class="fp-link" href="{{ route('login') }}">Log In</a>
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
    @yield('partials.afooter')
</body>
</html>

