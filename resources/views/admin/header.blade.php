<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        
          <!-- Log out               -->
          <div class="list-inline-item logout">
            <div class="nav-link dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ asset('Admin/img/avatar-1.jpg') }}" alt="profile" class="img-fluid rounded-circle" style="width: 30px; height: 30px;">
              <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
            </div>
            <div aria-labelledby="profileDropdown" class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ url('logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ url('logout') }}" 
                   onclick="event.preventDefault();
                   this.closest('form').submit();">
                   <i class="icon-logout mr-2"></i>Logout
                </a>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </nav>
  </header>