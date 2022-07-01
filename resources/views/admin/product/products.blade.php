@extends('admin_layouts.admin')

@section('title','Products')

@section('content')

<div class="content-wrapper">
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                    </div>
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{Session::get('status')}}
                        </div>
                        @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Num.</th>
                                    <th>Picture</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product SubCategory</th>
                                    <th>Product Price</th>
                                    <th>Product Qty</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)

                                    <tr>
                                        <td>{{$product->id}}</td>
                                        {{-- <td><img src="backend//dist/img/user2-160x160.jpg" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image"></td> --}}
                                        <td><img src="{{asset('assets/images/products/' .$product->product_image)}}" style="height : 50px; width : 50px" alt="Image" class="img-circle elevation-2"></td>
                                        <td>{{$product->product_name}}</td>
                                        <td> {{$product->categories[0]->category_name}}</td>
                                        <td>{{$product->categories[1]->category_name}}</td>
                                        <td>{{'$'.$product->product_price}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <a href="{{route('admin.product.activateproduct',$product->id)}}" class="btn btn-success">Unactivate</a>
                                            @else
                                                <a href="{{route('admin.product.activateproduct',$product->id)}}" class="btn btn-warning">Activate</a>
                                            @endif
                                            <a href="{{route('admin.product.editproduct',$product->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                            <a href="{{route('admin.product.deleteproduct',$product->id)}}" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Num.</th>
                                    <th>Picture</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product SubCategory</th>
                                    <th>Product Price</th>
                                    <th>Product Qty</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('style')
<link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endsection

@section('scripts')

<!-- DataTables -->
<script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="backend/dist/js/adminlte.min.js"></script>
<script src="backend/dist/js/bootbox.min.js"></script>

<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
            if (confirmed){
                window.location.href = link;
            };
        });
    });
</script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
