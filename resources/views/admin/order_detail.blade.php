{{-- {{dd($list_detail)}} --}}
{{-- @foreach($list_detail as $row)
{{$row->order_id}};
@endforeach --}}
@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Đơn hàng chi tiết
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="">Đơn hàng</li>
    <li class="active">Đơn hàng chi tiết</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách đơn hàng chi tiết</h3>
            </div>              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="flag">
                  <th>ID</th>
                  <th>Mã sản phẩm chi tiết</th>
                  <th>Số lượng</th>
                  <th>Giá sản phẩm ($)</th>
                  <th>Tổng giá ($)</th>
              
                </tr>
                </thead>
                <tbody>
                @foreach($list_detail as $row)
                <tr >
                  <td>{{$row->id}}</td>
                  <td>{{$row->product_detail_id}}</td>
                  <td>{{$row->quantity}}</td>
                  <td>{{$row->price}}</td>
                  <td>{{$row->price*$row->quantity}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Mã sản phẩm chi tiết</th>
                  <th>Số lượng</th>
                  <th>Giá sản phẩm ($)</th>
                  <th>Tổng giá ($)</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   
@endsection
@section('script')
<!-- DataTables -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection