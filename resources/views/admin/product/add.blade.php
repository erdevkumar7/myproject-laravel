@extends('admin.layouts.app')

@section('content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('productSave')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Product name">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Price">
                    <span class="input-group-text">$</span>
                </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="category" placeholder="Category">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Long description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Prodcut image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  {{-- <div class="container">
    <h1>Add Product</h1>
    <form action="{{ route('productSave') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name"  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price"  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description"  class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control">
      </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div> --}}
@endsection