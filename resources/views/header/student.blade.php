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
          <a class="nav-link js-scroll-trigger" href="{{route('student.home')}}"><i class="fas fa-home text-light">Ahabanza</i></a>
          </li>
   
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{route('student.favoriteBook')}}"><i class="far fa-heart text-light">Favorites</i></a>
          </li>

          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('student.allBooks')}}"><i class="fas fa-book text-light">Books</i></a>
          </li>

          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('quizzer.studentQuizzes')}}"><i class="fas fa-poll-h text-light">Quizes</i></a>
            </li>

          
  
            <li class="nav-item">
  
              <div class="dropdown">
                <a class="dropbtn nav-link js-scroll-trigger"> <i class="fas fa-user text-light">Account</i></a>
                <div class="dropdown-content">
                  <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt text-danger"></i>Logout</a>
                  
                  
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
                  
    
                  
                </div>
              </div>
            </li>
  
           
  
              <li class="nav-item"><img style="width: 50px; height:50px" src="{{ Voyager::image(Auth::user()->avatar) }}" alt=""></li>
        </ul>
      </div>
    </div>
  </nav>

  