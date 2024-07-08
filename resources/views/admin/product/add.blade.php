@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Add</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
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
                              <textarea class="form-control" name="description" placeholder="Description"></textarea>
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                {{-- <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Estimated budget</label>
                                <input type="number" id="inputEstimatedBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Total amount spent</label>
                                <input type="number" id="inputSpentBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimated project duration</label>
                                <input type="number" id="inputEstimatedDuration" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div> --}}
            </div>
   
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
