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
                        <li><a href="{{ url('/') }}" class="active">Home</a></li>
                        <li><a href="{{ url('explore') }}">Explore</a></li>
                        @auth
                            @if (Auth::user()->usertype == 'admin')
                        <li><a href="{{ url('home') }}">Admin Panel</a></li>
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
                </nav>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session()->get('error') }}
  </div>
@endif

  </header>