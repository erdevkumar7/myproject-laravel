@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Edit</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="{{ route('product_update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Price</label>
                                    <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                                <div class="form-group">
                                    <label for="productCategory">Category</label>
                                    <input type="text" value="{{ $product->category }}" class="form-control"
                                        name="category">
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                  <div class="mb-3 mt-2">
                                    <label for="productImage">Previous Image</label>
                                    @if ($product->image)
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" width="5%" height="5%">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                  </div>
                                  
                                    <label for="productImage">Select New Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="productImage">Choose file</label>
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
