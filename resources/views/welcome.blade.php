@extends('layouts.master')

@section('content')
@include('header.welcome') 

<div id="home" class="ct-header ct-header--slider ct-slick-custom-dots">
    <div class="ct-slick-homepage" data-arrows="true" data-autoplay="false">

        <div class="ct-header tablex item" data-background="images/1.jpg">
            <div class="ct-u-display-tablex">
                <div class="inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 slider-inner">
                                <h1 class="big animated">Twisomere</h1>
                                <p class="animated">
                                    
                                    Twifuza kubona buri mwana wese agera ku nzozi ze. Uruhare rwacu ni ukumuha inkuru zimwereka ko ashoboye, zimuremamo icyizere, ndetse ziryoshye.

                                </p>
                                <a data-toggle="modal" data-target="#myModal" class="btn-new from-middle animated" href="#">Iyandikishe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ct-header tablex item" data-background="images/2.jpg">
            <div class="ct-u-display-tablex">
                <div class="inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 slider-inner">
                                <h1 class="big animated">Twisomere</h1>
                                <p class="animated">

                                    Twifuza kubona buri mwana wese agera ku nzozi ze. Uruhare rwacu ni ukumuha inkuru zimwereka ko ashoboye, zimuremamo icyizere, ndetse ziryoshye.

                                </p>
                                <a data-toggle="modal" data-target="#myModal" class="btn-new from-middle animated" href="#">Iyandikishe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ct-header tablex item" data-background="images/3.jpg">
            <div class="ct-u-display-tablex">
                <div class="inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 slider-inner">
                                <h1 class="big animated">Twisomere</h1>
                                <p class="animated">
                                    
                                    Twifuza kubona buri mwana wese agera ku nzozi ze. Uruhare rwacu ni ukumuha inkuru zimwereka ko ashoboye, zimuremamo icyizere, ndetse ziryoshye.

                                </p>
                                <a data-toggle="modal" data-target="#myModal" class="btn-new from-middle animated" href="#">Get involved</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- .ct-slick-homepage -->
</div><!-- .ct-header --> 

<div id="about" class="section wb" style="padding-bottom: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">                        
                    <h2>TWIS </h2>
                    <p style="font-size: 25px;color: black;"> 
                        Intego nyamukuru yacu ni ukugeza inkuru nziza, zijyanye n’imyaka ndetse zishingiye ku muco ku bana mu rwego rwo kubafasha mu rugendo rwabo rwo kwiga.
                    </p>
                    
                    <ul>
                        <li><b>Dukurikirane</b></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
<!-- 
                    <a class="btn-new from-middle animated" href="#">Get involved</a> -->
                </div><!-- end messagebox -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="right-box-pro wow fadeIn">
                    <img src="images/4.jpg" alt="" class="img-fluid img-rounded fat-ab">
                </div><!-- end media -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="about" class="section wb" style="padding: 10px 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">                       
                    <h1 style="text-align: center;">
                        " Twifuza kubona buri mwana wese agera ku nzozi ze. Uruhare rwacu ni ukumuha inkuru zimwereka ko ashoboye, zimuremamo icyizere, ndetse ziryoshye. "
                    </h1>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="pricing" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Ibiciro</h3>
            <!-- <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p> -->
        </div><!-- end title -->

        <div class="row">
            
            <!-- FIRST ONE  -->
@foreach($plans as $plan)
<div class="columns col-md-4">
    <ul class="price">
    <li class="header bg-primary">{{$plan->name}}</li>
      <li class="grey">$ {{$plan->price}} / Month</li>
      <li>10GB Storage</li>
     
   
    <li class="grey"><a href="{{route('subscription.subscribe',$plan->id)}}"  style="background: #faad3b"  class="button">Sign Up</a></li>
    </ul>
  </div>
@endforeach

          
        

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->


 <div id="testimonials" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Ubuhamya</h3>
            <p>We thanks for all our awesome testimonials! There are hundreds of our happy customers! </p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Wonderful Support!</h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_01.png" alt="" class="img-fluid">
                            <h4>James Fernando </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Awesome Services!</h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_02.png" alt="" class="img-fluid">
                            <h4>Jacques Philips </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Great & Talented Team!</h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_03.png" alt="" class="img-fluid">
                            <h4>Venanda Mercy </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Wonderful Support!</h3>
                            <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_01.png" alt="" class="img-fluid">
                            <h4>James Fernando </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Awesome Services!</h3>
                            <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_02.png" alt="" class="img-fluid">
                            <h4>Jacques Philips </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->

                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3> Great & Talented Team!</h3>
                            <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                        <div class="testi-meta">
                            <img src="uploads/testi_03.png" alt="" class="img-fluid">
                            <h4>Venanda Mercy </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div><!-- end testimonial -->
                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->


<div  id="contact" class="section db">
    <div class="container">
        <div class="section-title text-center">
            <h3>Tuvugishe</h3>
            <p>Ukeneye ubufasha cyangwa igitekerezo watwandikira hano</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" type="text" placeholder="Amazina Yawe" required="required" data-validation-required-message="Amazina Yawe">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" type="email" placeholder="E-mail Yawe" required="required" data-validation-required-message="E-mail Yawe.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" type="tel" placeholder="Telefoni Yawe" required="required" data-validation-required-message="Telefoni Yawe.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Ubutumwa cyangwa igitekerezo" required="required" data-validation-required-message="Ubutumwa cyangwa igitekerezo"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="sim-btn btn-new from-middle animated" data-text="Send Message" type="submit">Ohereza</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>
        <div class="modal-body">
            <h2 >Iyandikishe </h2>

          <a class="btn-new from-middle animated" href="master/school-registration.php">Ikigo</a> &nbsp; <a class="btn-new from-middle animated" href="master/parent-registration.php">Umubyeyi</a>
        </div>
       
      </div>
  
    </div>
  </div>


<div class="copyrights">
    <div class="container">
        <div class="footer-distributed">
            <div class="footer-left">
                <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">Twisomere</a>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

@endsection



