<nav class="navbar navbar-expand-lg navbar-dark fixed-top  bg-primary" id="mainNav">
        
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <img style="width:170px" class="img-fluid" src="{{asset('frontend/images/logo.png')}}" alt="" />
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger " href="{{route('teacher.home')}}"><i class="fa fa-home">Home </i></a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('teacher.students')}}">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#pricing"><i class="fa fa-envelope">Messages</i></a>
          </li>
          
         
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Help</a>
          </li>

          <li class="nav-item">

            <div class="dropdown">
              <a class="dropbtn nav-link js-scroll-trigger">Account</a>
              <div class="dropdown-content">
                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                
                
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
                
                <a href="#">Settings</a>
                
              </div>
            </div>
          </li>

         

            <li class="nav-item"><img style="width: 50px; height:50px" src="{{ Voyager::image(Auth::user()->avatar) }}" alt=""></li>
        </ul>
      </div>
    </div>
  </nav>


  @if(session()->has('message'))
  <div class="alert alert-success message">
      
    <i class="fas fa-check-circle text-success"></i> {{ session()->get('message') }}
    </div>
  @endif