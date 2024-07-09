@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('product_edit', $product->id) }}" class="btn btn-danger m-1">Product Edit</a>
                            <a href="{{ route('product_all') }}" class="btn btn-danger m-1">Back</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Price</label>
                                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" aria-label="Amount (to the nearest dollar)" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="productCategory">Category</label>
                                    <input type="text" value="{{ $product->category }}" class="form-control" name="category" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea class="form-control" name="description" readonly>{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Product Image</label>
                                    @if ($product->image)
                                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" width="10%" height="10%">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
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
