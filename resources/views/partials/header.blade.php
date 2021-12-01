
<nav class="navbar main-navigation navbar-fixed-top has-shadow">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><img src="/assets/admin/images/finallogo.png" alt="logo"></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          @foreach ($menus as $menu )
            @if ($menu->has_menu_subitems==0)
              <li><a href="{{ route( 'showPage',['PageId'=>$menu->id,'slug'=>$menu->slug])  }}" >{{ $menu->menu_item_name }}</a></li>
            @else
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ $menu->menu_item_name }}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   @foreach ($submenus as $submenu )
                     @if ($submenu->menu_item_id==$menu->id)
                        <li><a href="{{ route( 'showSubPage',['subPageId'=>$submenu->id,'slug'=>$submenu->slug])  }}">{{ $submenu->submenu_item_name }}</a></li>
                       
                      @endif 
                    @endforeach 
                  </ul>
                </li>
            @endif            
          @endforeach
           <!-- <li><a href="home" >Home</a></li>
          
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">IT Services<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/it-services">Managed IT Services</a></li>
              <li><a href="/remote-support">Remote Support</a></li>
              <li><a href="/project-management">Project Management</a></li>
              <li><a href="/infrastructure-management">Infrastructure Management</a></li>
              <li><a href="/it-strategy">IT Strategy</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cyber Security<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="managed-security-services">Managed Security Services</a></li>
              <li><a href="cyber-incident-recovery">Cyber Incident Recovery</a></li>
              <li><a href="it-dos-donts">Do's &amp; Don'ts</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cloud Services<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="home/cloud_services/cloud-based-multi-factor-authentication">Cloud Based Multi-factor Authentication</a></li>
              <li><a href="home/cloud_services/cloud-services-based-on-security-service">Cloud Services based on security service</a></li>
            </ul>
          </li>
         <li><a href="home/products" >Products</a></li> 
        <li><a href="home/support" >Support</a></li>-->       
                 
          
              @if(Auth::user())
              <li><a href="#"></a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user style="margin-right:5px;"></i>  Hi {{ explode(' ',Auth::user()->user_name)[0] }}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href={{ route('user.dashboard')  }}>Dashboard</a></li>
                  <li><a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i data-feather="log-out" class="icon"></i>
                    LogOut
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </ul>
              </li>
          
              @else             
              
          
                <li><a href="{{ route('login') }}"  class="btn btn-default btn-outline btn-circle" >Login</a></li>
            @endif
          
        </ul>
      </div>
    </div>
  </nav>
