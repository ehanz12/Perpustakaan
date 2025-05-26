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
            <div>
                <h1>Add Book</h1>
                <form action="{{ url('store_book') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="author_name" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter author">
                    </div>
                    <div class="mb-3">
                        <label for="prince" class="form-label">Prince</label>
                        <input type="text" class="form-control" id="prince" name="prince" placeholder="Enter prince">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label for="book_img" class="form-label">Book Image</label>
                        <input type="file" class="form-control" id="book_img" name="book_img">
                    </div>
                    <div class="mb-3">
                        <label for="author_img" class="form-label">Author Image</label>
                        <input type="file" class="form-control" id="author_img" name="author_img">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" aria-label="Pilih kategori">
                            <option value="" selected disabled>Pilih kategori buku</option>
                            @foreach ($datas as $data)
                                <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
       @include('admin.footer')
  </body>
</html>