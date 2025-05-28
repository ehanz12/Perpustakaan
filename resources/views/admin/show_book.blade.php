<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
                
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-gradient-dark py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-white">Daftar Buku Perpustakaan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Book Title</th>
                                    <th scope="col">Author Name</th>
                                    <th scope="col" class="text-end">Price</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" class="text-center">Author Image</th>
                                    <th scope="col" class="text-center">Book Image</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td class="fw-medium">{{ $book->title }}</td>
                                        <td>{{ $book->author_name }}</td>
                                        <td class="text-end">Rp {{ number_format($book->prince, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $book->quantity > 0 ? 'success' : 'danger' }} rounded-pill text-white">
                                                {{ $book->quantity }}
                                            </span>
                                        </td>
                                        <td>
                                            <p class="text-muted mb-0 text-truncate" style="max-width: 200px;">
                                                {{ $book->description }}
                                            </p>
                                        </td>
                                        <td>
                                            <span class="badge bg-dark text-white">
                                                {{ $book->category->title }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('author_img/' . $book->author_img) }}" 
                                                 alt="Author" 
                                                 class="rounded-circle border shadow-sm"
                                                 width="40" height="40"
                                                 style="object-fit: cover;">
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('book_img/' . $book->book_img) }}" 
                                                 alt="Book Cover" 
                                                 class="rounded shadow-sm"
                                                 width="40" height="50"
                                                 style="object-fit: cover;">
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ url('edit_book', $book->id) }}" class="btn btn-info">
                                                    Edit
                                                </a>
                                                <a href="{{ url('delete_book', $book->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4 text-muted">
                                            <i class="fas fa-book-open me-2"></i>Belum ada data buku
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
       @include('admin.footer')
  </body>
</html>