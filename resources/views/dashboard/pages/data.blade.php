@extends('dashboard.layouts.master')



@section('title')
<title>DataTable-Store</title>
@endsection



@section('custom-styles')
 <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category Id</th>
                        <th>Actions</th>
                    </tr>
                  
                  </thead>

                  <tbody>


                  @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product['id']}}</th>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['description']}}</td>
                                    <td>{{$product->category_id}}</td>
                                  
            <td>
            <a href="{{route('products.updateform', $product->id)}}"><input class="btn btn-info " value="Update product" type="submit"></a>
            <form action="{{route('products.delete', $product->id)}}" method="post">
            @csrf   
            @method('delete')
            <input class="btn btn-danger " value="Delete product" type="submit">
           </form>
          </td>
                       </tr>
                                @endforeach
                            </tbody>

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

@endsection

@section('custom-scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('custom-dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('custom-dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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


