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
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-gradient-primary py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-white">Daftar Permintaan Peminjaman</h6>
                    <span class="badge bg-light text-primary">Total: {{ $borrows->count() }}</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Book Title</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Book Image</th>
                                    <th class="text-center">Change Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($borrows as $borrow)
                                <tr>
                                    <td class="fw-medium">{{ $borrow->user->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-envelope-fill text-muted me-2"></i>
                                            {{ $borrow->user->email }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-telephone-fill text-muted me-2"></i>
                                            {{ $borrow->user->phone }}
                                        </div>
                                    </td>
                                    <td>{{ $borrow->book->title }}</td>
                                    <td class="text-center">{{ $borrow->book->quantity }}</td>
                                    <td class="text-center">
                                        @if ($borrow->status == 'approved')
                                        <span class="text-green-300">{{ $borrow->status }}</span>
                                        @endif
                                        @if ($borrow->status == 'rejected')
                                        <span class="text-red-600">{{ $borrow->status }}</span>
                                        @endif
                                        @if ($borrow->status == 'returned')
                                        <span class="text-red-800">{{ $borrow->status }}</span>
                                        @endif
                                        @if ($borrow->status == 'Applied')
                                        <span class="text-white">{{ $borrow->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('book_img/' . $borrow->book->book_img) }}" 
                                             alt="Book Cover"
                                             class="rounded shadow-sm"
                                             style="width: 60px; height: 80px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <form action="{{ url('update_borrow', $borrow->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-success btn-sm" {{ $borrow->status == 'approved' ? 'disabled' : '' }}>
                                                    <i class="bi bi-check-circle me-1"></i>approved
                                                </button>
                                            </form>
                                            
                                            <form action="{{ url('rejected_borrow', $borrow->id) }}" method="POST" class="d-inline mx-1">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-warning btn-sm" {{ $borrow->status == 'rejected' ? 'disabled' : '' }}>
                                                    <i class="bi bi-clock me-1"></i>rejected
                                                </button>
                                            </form>
                                            
                                            <form action="{{ url('return_borrow', $borrow->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="status" value="returned">
                                                <button type="submit" class="btn btn-danger btn-sm" {{ $borrow->status == 'returned' ? 'disabled' : '' }}>
                                                    <i class="bi bi-x-circle me-1"></i>returned
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox me-2"></i>
                                        Belum ada permintaan peminjaman
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