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
            <a class="nav-link js-scroll-trigger " href="#home">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{route('teacher.students')}}">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#pricing">Chat</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#testimonials">Ubuhamya</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Tuvugishe</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="master/login.php">Injira</a>
            </li>

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