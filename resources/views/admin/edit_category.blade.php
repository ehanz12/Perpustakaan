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
                        <h2 class="text-center no-margin-bottom">Edit Kategori</h2>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form action="{{ url('update_category', $data->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Nama Kategori</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
    </div>
</body>
</html>