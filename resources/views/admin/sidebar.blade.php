<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{ asset('Admin/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{ url('categories_page') }}"> <i class="icon-grid"></i>Categories</a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Book </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('add_book') }}">Add Books</a></li>
                <li><a href="{{ url('show_book') }}">Show Books</a></li>
              </ul>
            </li>
            <li><a href="{{ url('borrow_request') }}"> <i class="icon-logout"></i>Borrow request </a></li>
  </nav>