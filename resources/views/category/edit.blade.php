@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Edit</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="{{ route('category_update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$category->name}}" id="categoryName" oninput="removeError('nameError')">
                                    @error('name')
                                    <span class="text-danger" id="nameError">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryType">Category Type</label>
                                    <input type="text" class="form-control" name="type" value="{{$category->type}}" id="categoryType" oninput="removeError('typeError')">
                                    @error('type')
                                    <span class="text-danger" id="typeError">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" oninput="removeError('descriptionError')">{{$category->description}}</textarea>
                                    @error('description')
                                    <span class="text-danger" id="descriptionError">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Category Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" oninput="removeError('imageError')">
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
                            var errorElement = document.getElementById(id);
                            if (errorElement) {
                                errorElement.style.display = 'none';
                            }
                        }
                        </script>
                        
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
