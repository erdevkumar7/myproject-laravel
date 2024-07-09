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
                        <form action="{{ route('productSave') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">Product name</label>
                                    <input type="text" class="form-control" name="name" id="productName"
                                        oninput="removeError('nameError')">
                                    @error('name')
                                        <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Price ($)</label>
                                    <input type="text" name="price" class="form-control" id="productPrice"
                                        oninput="removeError('priceErr')">
                                    @error('price')
                                        <span class="text-danger" id="priceErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="productCategory">Category</label>
                                    <input type="text" class="form-control" name="category" id="productCategory"
                                        oninput="removeError('categoryErr')">
                                    @error('category')
                                        <span class="text-danger" id="categoryErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Description</label>
                                    <textarea class="form-control" name="description" id="productDescription" oninput="removeError('descErr')"></textarea>
                                    @error('description')
                                        <span class="text-danger" id="descErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="productImage"
                                                oninput="removeError('imageError')" onchange="updateFileName()">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="text-danger" id="imageError">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <script>
                            function removeError(id) {
                                var errElement = document.getElementById(id);
                                if (errElement) {
                                    errElement.style.display = 'none'
                                }
                            }

                            function updateFileName() {
                                var input = document.getElementById('productImage');
                                var label = input.nextElementSibling;
                                if (input.files.length > 0) {
                                    label.innerText = input.files[0].name;
                                } else {
                                    label.innerText = 'Choose file';
                                }
                            }
                        </script>
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
