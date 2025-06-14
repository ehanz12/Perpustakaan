<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    @include('home.css')
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  @include('home.header')

  
  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active"><a href="{{ url('explore') }}" class="text-white">All Books</a></li>
              @foreach ($categories as $category)
              <li data-filter=".dig"><a href="{{ url('cat_search', $category->id) }}" class="text-white">{{ $category->title }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
          <div>
            <form action="{{ url('search') }}" method="GET" class="mb-5">
              @csrf
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari buku atau penulis..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-search"></i> Cari
                </button>
              </div>
            </form>
          </div>
            @foreach ($books as $book)
                
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image bg-cover">
                  <img src="/book_img/{{ $book->book_img }}" alt="" style="border-radius: 20px; min-width: 200px; max-height: 250px;">
                </div>
                <div class="right-content">
                  <h4>{{ $book->title }}</h4>
                  <span class="author">
                    <img src="/author_img/{{ $book->author_img }}" alt="" style="max-width: 50px; max-height: 56px; border-radius: 50%;">
                    <h6>{{ $book->author_name }}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{ $book->quantity }}</strong><br> 
                  </span>
                  <span class="ends">
                    Total<br><strong>{{ number_format($book->prince, 0, ',', '.') }}</strong><br>
                  </span>
                  <div class="text-button">
                    <a href="{{ url('book_details', $book->id) }}">View Item Details</a>
                  </div>
                  <div class="text-button">
                    <a class="btn btn-primary text-white" href="{{ url('borrow_book', $book->id) }}">Apply To Borrow</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>