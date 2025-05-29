<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul>
          </div>
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
                    <a href="details.html">View Item Details</a>
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
