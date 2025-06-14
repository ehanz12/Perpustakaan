<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Liberty Template - NFT Item Detail Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-liberty-market.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('explore') }}">Explore</a></li>
                        @auth
                        @if (Auth::user()->usertype == 'admin')
                    <li><a href="{{ url('admin') }}">Admin Panel</a></li>
                        @endif
                    @endauth
                    @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a href="{{ url('book_history') }}">My History</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <form method="POST" action="{{ url('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ url('logout') }}"
                                               onclick="event.preventDefault();
                                               this.closest('form').submit();">
                                               <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if(Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul> 
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="left-image">
            <img src="/book_img/{{ $books->book_img }}" alt="" style="border-radius: 20px;">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h4></h4>
          <span class="author">
            <img src="/author_img/{{ $books->author_img }}" alt="" style="max-width: 50px; border-radius: 50%;">
            <h6>{{ $books->title }}</h6>
          </span>
          <p>{{ $books->description }}</p>
          <div class="row">
            <div class="col-3">
              <span class="bid">
                Available<br><strong>{{ $books->prince }}</strong><br>
              </span>
            </div>
            
            <div class="col-5">
              <span class="ends">
                Total Quantity<br><strong>{{ $books->quantity }}</strong><br>
              </span>
            </div>
          </div>
          
        </div>
        
  </div>
    </div>
      </div>

<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a target="_blank" href="https://www.youtube.com/channel/UCeNYDojo4nU2sbHz1sMsBXw">Web Tech Knowledge
          &nbsp;&nbsp;
          Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://www.youtube.com/channel/UCeNYDojo4nU2sbHz1sMsBXw" target="_blank">Web Tech Knowledge</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/tabs.js') }}"></script>
  <script src="{{ asset('assets/js/popup.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  </body>
</html>