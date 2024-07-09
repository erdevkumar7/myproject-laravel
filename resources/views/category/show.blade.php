@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Details</h1>
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
                                    <label for="categoryName">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="categoryType">Type</label>
                                    <input type="text" name="type" value="{{ $category->type }}" class="form-control" aria-label="Amount (to the nearest dollar)" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="categoryDescription">Description</label>
                                    <textarea class="form-control" name="description" readonly>{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="categoryImage">Category Image </label>
                                    @if ($category->image)
                                        <img src="{{ asset('images/category/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid" width="10%" height="10%">
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