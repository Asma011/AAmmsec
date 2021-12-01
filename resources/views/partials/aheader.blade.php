<!-- <div class="preloader">

    <div class="d-table">

        <div class="d-tablecell">

            <span class="loader">

                <span class="loader-inner"></span>

            </span>

        </div>

    </div>

</div> -->

<nav class="navbar navbar-expand fixed-top top-menu">
    <a class="navbar-brand" href="admin/dashboard">
        <!-- Large logo -->
        <img class="large-logo" src="{{ asset('assets/admin/images/finallogo.png') }}" alt="Logo">
        <!-- Small logo -->
        <img class="small-logo" src="{{ asset('assets/admin/images/small-logo.png') }}" alt="Logo">    
    </a>
    <!-- Burger menu -->
    <div class="burger-menu x">
        <span class="top-bar"></span>
        <span class="middle-bar"></span>
        <span class="bottom-bar"></span>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Mega Menu -->
        <ul class="left-nav d-none navbar-nav">
            <li class="nav-item dropdown mega-menu">
                <a class="nav-link dropdown-toggle" href="admin/dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="mega-menu-btn">
                        Mega Menu
                        <i data-feather="chevron-down" class="icon"></i>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <h5 class="title">Components</h5>
                                <a class="dropdown-item" href="assets/admin/ui-component/alerts.html">Alerts</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/badges.html">Badges</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/buttons.html">Buttons</a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h5 class="title">Components</h5>
                                <a class="dropdown-item" href="assets/admin/ui-component/cards.html">Cards</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/dropdowns.html">Dropdowns</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/forms.html">Forms</a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h5 class="title">Components</h5>
                                <a class="dropdown-item" href="assets/admin/ui-component/list-groups.html">List Groups</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/modals.html">Modals</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/progress-bars.html">Progress Bars</a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h5 class="title">Components</h5>
                                <a class="dropdown-item" href="assets/admin/ui-component/tables.html">Tables</a>
                                <a class="dropdown-item" href="assets/admin/ui-component/tabs.html">Tabs</a>
                                <a class="dropdown-item" href="assets/admin/page/gallery.html">Gallery</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Right nav -->
        <ul class="navbar-nav right-nav ml-auto"> 
            <li class="message-box dropdown nav-item d-none">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="count-info" onclick="readnotificationstatus()">
                        <i data-feather="bell" class="icon"></i>              
                        <span class="ci-number">
                            <span class="ripple"></span>
                            <span class="ripple"></span>
                            <span class="ripple"></span>
                        </span>                       
                    </div>
                </a>
                <div class="dropdown-menu d-none">                    
                    <a class="dropdown-item" href="#">
                        <div class="message-item">
                            <div class="user-pic">                                  
                                <!-- <span class="profile-status online"></span> -->
                            </div>
                            <div class="chat-content">
                                <span class="message-title"></span>
                                <span class="mail-desc"></span>
                            </div>
                            <!-- <span class="time">0 seconds ago</span> -->
                        </div>
                    </a>                    
                    <a class="dropdown-item" href="#">
                        Check all notifications
                        <i data-feather="chevron-right" class="icon"></i>
                    </a>
                </div>
            </li>
            <!-- Profile dropdown -->
            <li class="nav-item dropdown profile-nav-item">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        
                        <img class="rounded-circle" src="{{ asset('assets/admin/images/user1.png') }}" alt="Profile Image">
                        <span class="name"> Hi {{ explode(' ',Auth::user()->user_name)[0] }}</span>
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="admin/profile">
                        <i data-feather="user" class="icon"></i>
                        Profile
                    </a> 
                    <a class="dropdown-item"
                         href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i data-feather="log-out" class="icon"></i>
                        LogOut
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>	

<!-- Side Menu --> 
<div class="sidemenu-area default">
    <nav class="sidemenu navbar navbar-expand navbar-light">
        <div class="navbar-collapse collapse">
            <div class="navbar-nav">
                <div class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="{{ route('admin.dashboard') }}">
                        <div class="dropdown-title">
                            <i data-feather="grid" class="icon"></i>
                            <span class="title">
                                Dashboard
                                <i data-feather="chevron-right" class="icon fr"></i>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="{{ route('admin.showMenuLinks') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Manage Menu Links
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="{{ route('admin.showSubMenuLinks') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Manage Sub Menu Links
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="{{ route('admin.showPageList') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Manage Pages
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('admin.showSubPageList') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Manage Sub Page
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('admin.showQuizList') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Manage Quiz
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('admin.showuserList') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                User Management
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('admin.showsurveyList') }}">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Survey List
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                {{-- <div class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="/admin-home-decs">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Home Page
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="/admin-it-services">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                IT Services
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/admin-cyber-security">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Cyber Security
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/admin-cloud-services">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Cloud Services
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/admin-support-categories">
                        <div class="dropdown-title">
                        <i data-feather="hexagon" class="icon"></i>
                            <span class="title">
                                Support Management
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right icon fr"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </span>
                        </div>
                    </a>
                </div> --}}
            </div>
        </div>
    </nav>
</div>
<div class="main-content d-flex flex-column">
<script type="text/javascript">
    function readnotificationstatus(){
        $.ajax({
          url: "/admin/notification_status",
          error:function(request,response){
            console.log(request);
          },
          success: function(result){
            $('.ci-number').hide();
          }
        });
    }
</script>   
    
    
    <script>
    
     /*   toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
    
    
    
    

<script>
    $(".burger-menu").click(function(){
    $(".sidemenu-area").addClass("sidemenu-toggle");  
});
</script>

<script>
    $(document).ready(function(){
    $('.dropdown-submenu a.dropdown-toggle').on("click", function(e){
        $(this).next('.dropdown').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    });
</script>