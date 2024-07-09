@extends('admin.template')

@section('contents')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category All</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{route('category_add')}}" class="btn btn-danger">Add Category</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
   
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Category Name
                                    </th>
                                    <th style="width: 30%">
                                       description
                                    </th>
                                    <th>
                                       Type
                                    </th>
                                    <th style="width: 21%" class="text-center">
                                       Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            <a>
                                                {{ $category->name }}
                                            </a>
                                        </td>
                                        <td>
                                           <a>{{ $category->description }}</a>
                                           
                                        </td>
                                        <td>
                                           <a>{{ $category->type }}</a>
                                        </td>
                                        <td>
                                           <a href="{{route('category_show', $category->id)}}" class="btn btn-info">View</a>
                                           <a href="{{route('category_edit', $category->id)}}" class="btn btn-warning">Edit</a>
                                           <form action="{{route('category_destroy', $category->id)}}" method="POST" style="display:inline;">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="btn btn-danger">Delete</button>
                                           </form>
                                       </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
   
            </section>
            <!-- /.content -->
    </div>
@endsection
