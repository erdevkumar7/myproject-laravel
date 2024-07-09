 @extends('admin.template')

 @section('contents')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0">Product All</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('product_add') }}" class="btn btn-danger">Add Product</a>
                        </ol>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title">Products</h3>

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
                                     Product Name
                                 </th>
                                 <th style="width: 30%">
                                    description
                                 </th>
                                 <th>
                                    Category
                                 </th>
                                 <th style="width: 8%" class="text-center">
                                     Price
                                 </th>
                                 <th style="width: 21%" class="text-center">
                                    Action
                                 </th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($products as $product)
                                 <tr>
                                     <td>
                                         #
                                     </td>
                                     <td>
                                         <a>
                                             {{ $product->name }}
                                         </a>
                                     </td>
                                     <td>
                                        <a>{{ $product->description }}</a>
                                        
                                     </td>
                                     <td>
                                        <a>{{ $product->category }}</a>
                                     </td>
                                     <td class="project-state">
                                         <span>{{ $product->price }}</span>
                                     </td>
                                     <td>
                                        <a href="{{ route('product_show', $product->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('product_edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
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
     <!-- /.content-wrapper -->
 @endsection
