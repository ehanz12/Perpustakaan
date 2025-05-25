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
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="mb-4">
                                <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>
                                <form action="{{ url('add_category') }}" method="post" class="row g-3 align-items-center">
                                    @csrf
                                    <div class="col-auto">
                                        <label for="category" class="col-form-label">Nama Kategori</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" name="category" id="category" class="form-control" required>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center" style="width: 80px">No</th>
                                            <th>Nama Kategori</th>
                                            <th class="text-center" style="width: 200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td class="text-center">
                                                <div class="btn-group pr-2" role="group">
                                                    <a href="{{ url('edit_category', $data->id) }}"><button type="button" class="btn btn-sm btn-info btn-outline-info">Edit</button></a>
                                                    <a href="{{ url('delete_category', $data->id) }}"><button type="button" class="btn btn-sm btn-outline-danger">Hapus</button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        @include('admin.footer')
    </div>
</body>
</html>