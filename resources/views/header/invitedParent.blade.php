<nav class="navbar navbar-expand-lg navbar-dark fixed-top  bg-primary" id="mainNav">
        
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <img style="width:170px" class="img-fluid" src="master/assets/images/icon/test.png" alt="" />
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger " href="{{route('invitedParent.home')}}"><i class="fa fa-home text-light">Dashboard </i></a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('invitedParent.myKid')}}"><i class="fas fa-child text-light">My Kid</i></a>
          </li>
        
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact"><i class="fas fa-question text-light">Help</i></a>
          </li>

          <li class="nav-item">

            <li class="nav-item">
  
              <div class="dropdown">
                <a class="dropbtn nav-link js-scroll-trigger"> <i class="fas fa-user text-light">Account</i></a>
                <div class="dropdown-content">
                  <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt text-danger"></i>Logout</a>
                  
                  
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
                  
      <a href="{{route('accounts.profile')}}"> <i class="fas fa-user-cog text-primary"></i>Profile</a>
                  
                </div>
              </div>
            </li>
  
            <?php 
                        
            $path=Auth::user()->avatar;
            
            ?>
  
              <li  class="nav-item"><img style="width: 60px; height:60px; border-radius: 50%;" src="{{asset($path)}}" alt=""></li>
          
         
        

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn-new from-middle animated" data-toggle="modal" data-target="#myModal" href="#">Iyandikishe</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>


  @if(session()->has('message'))
  <div class="alert alert-success message">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('message') }}
    </div>
  @endif