<!DOCTYPE html>
<html lang="en">

  <head>

    @include('home.css')
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  @include('home.header')

  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h3 class="text-white mb-0">Riwayat Peminjaman</h3>
                </div>
                <div class="bg-light rounded-pill px-3 py-2 d-flex align-items-center">
                    <i class="bi bi-book text-primary me-2"></i>
                    <span class="fw-medium">Total: {{ $books->count() }}</span>
                </div>
            </div>
            
            <div class="row g-4">
                @forelse($books as $book)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow-md transition-all">
                        <div class="position-relative">
                            <div class="bg-dark bg-opacity-50 position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 hover-opacity-100 transition-all">
                                <button class="btn btn-light btn-sm">
                                    <i class="bi bi-eye me-1"></i>Detail
                                </button>
                            </div>
                            <img src="{{ asset('book_img/' . $book->book->book_img) }}" 
                                 class="card-img-top" 
                                 style="height: 250px; object-fit: cover;"
                                 alt="{{ $book->book->title }}">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-{{ $book->status == 'approved' ? 'success' : ($book->status == 'pending' ? 'warning' : 'danger') }} bg-gradient shadow-sm">
                                    <i class="bi bi-{{ $book->status == 'approved' ? 'check-circle' : ($book->status == 'pending' ? 'clock' : 'x-circle') }} me-1"></i>
                                    {{ ucfirst($book->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body position-relative">
                            <h5 class="card-title fw-bold text-truncate">{{ $book->book->title }}</h5>
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle p-2 me-2">
                                    <i class="bi bi-person text-primary"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Penulis</small>
                                    <span class="fw-medium">{{ $book->book->author_name }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <small>Dipinjam: {{ $book->created_at->format('d M Y') }}</small>
                                </div>
                                @if($book->status == 'approved')
                                <button class="btn btn-primary btn-sm position-relative overflow-hidden">
                                    <span class="position-relative z-1">
                                        <i class="bi bi-arrow-return-left me-1"></i>Kembalikan
                                    </span>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-opacity-25 bg-white opacity-0 hover-opacity-100 transition-all"></div>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-book display-1 text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada riwayat peminjaman</h5>
                        <p class="text-muted mb-4">Anda belum meminjam buku apapun</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>

<style>
.hover-shadow-md:hover {
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    transform: translateY(-2px);
}
.transition-all {
    transition: all .3s ease;
}
.hover-opacity-100:hover {
    opacity: 1!important;
}
.z-1 {
    z-index: 1;
}
</style>
      </div>
    </div>
  </div>


  
  @include('home.footer')

  </body>
</html>