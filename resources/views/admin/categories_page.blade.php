<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_center{
            text-align: center;
            margin: auto;
        }
        .div_center h1{
            font-size: 40px;
            color: white;
            padding: 15px;
        }
    </style>
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
            <div class="div_center">
                <div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <h1>Add Category</h1>
                <form action="{{ url('add_category') }}" method="post">
                    @csrf
                    <span style="padding-right: 15px; ">
                        <label for="category">Category Name</label>
                        <input type="text" name="category" required>
                    </span>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>      
       @include('admin.footer')
  </body>
</html>