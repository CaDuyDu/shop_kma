@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<section class="content-header">
	<h1>
		Đơn đặt hàng
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		<li class="" class="active">Đơn đặt hàng</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Quản lý đơn đặt hàng</h3>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr id="flag">
								<th>ID</th>
								<th>Mã đơn hàng</th>
								<th>Tên khách hàng</th>
								<th>SDT</th>
								<th>Email</th>
								<th>Địa chỉ</th>
								<th>Tổng giá trị đơn hàng($)</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr id="order_{{$order['id']}}" >
								<td>{{$order['id']}}</td>
								<td>{{$order['code']}}</td>
								<td>{{$order['name']}}</td>
								<td>{{$order['mobile']}}</td>
								<td>{{$order['email']}}</td>
								<td>{{$order['address']}}</td>
								
								<td>{{$order['total_price']}}</td>
								<td>
									@if($order['status']==true)
									<small id="status" data-id="{{$order['id']}}" style="cursor: pointer;" class="label label-danger">Chưa xuất</small>
									@else
									<small style="cursor: pointer;" class="label label-success">Đã xuất</small>
									@endif
								</td>
								<td>
									<a href="orders/{{$order['id']}}"><button type="button" id="info" class="btn btn-primary"  data-id="{{$order['id']}}">
										<i class="fa fa-eye"></i>
									</button></a>
									<button class="btn btn-danger" id="delete" data-id="{{$order['id']}}" type="button">
				                      <i class="fa fa-trash"></i>
				                    </button>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Mã đơn hàng</th>
								<th>Tên khách hàng</th>
								<th>SDT</th>
								<th>Email</th>
								<th>Địa chỉ</th>
								<th>Tổng giá trị đơn hàng</th>
								<th>Trạng thái</th>
								<th>Hành động</th>
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
		$('#example1').DataTable({
	      'paging'      : true,
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : false,
	      'info'        : true,
	      'autoWidth'   : true
	    })
	})
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	  $(document).on('click','#delete',function(){
	    var id = $(this).data('id');
	    var btn = $(this);
	    swal({
	      title: "Bạn có chắc chắn muốn xóa?",
	      text: "Sau khi xóa không thể lấy lại dữ liệu!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	        $.ajax({
	          type:'delete',
	          url:'order/'+id,
	          success: function(response){
	            btn.parent().parent().slideUp();
	            toastr.success(response.message);
	          }
	        })
	      } else {
	        swal("Nhãn hàng chưa bị xóa!");
	      }
	    });
	    
	  })
	  $(document).on('click','#status',function(){
	  	var id = $(this).data('id');
	    var btn = $(this);
	    swal({
	      title: "Đơn hàng đã được gửi đi?",
	      text: "Xác nhận",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willChange) => {
	      if (willChange) {
	        $.ajax({
	          type:'get',
	          url:'order/status/'+id,
	          success: function(response){
	            btn.parent().html('<small style="cursor: pointer;" class="label label-success">Đã xuất</small>');
	            toastr.success(response.message);
	          }
	        })
	      } else {
	        swal("Đơn hàng vẫn giữ trạng thái cũ!");
	      }
	    });
	  })
</script>
@endsection