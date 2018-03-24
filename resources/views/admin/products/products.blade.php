@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="active">Sản phẩm</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý sản phẩm</h3>
            </div>
            <div class="box-header">
              <a href="{{route("createProduct")}}"><button class="btn btn-primary">Thêm sản phẩm</button></a>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>Mã nhãn hàng</th>
                  <th>Danh mục</th>
                  <th>Giới thiệu</th>
                  <th>Giá</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                <tr id="product_{{$product['id']}}" >
                  <td>{{$product['id']}}</td>
                  <td>{{$product['code']}}</td>
                  <td>{{$product['name']}}</td>
                  <td>{{$product['brand_id']}}</td>
                  <td>{{$product['category_id']}}</td>
                  <td>{!!$product['description']!!}</td>
                  <td>{{$product['price']}}</td>
                  <td>
                    <a href="product/{{$product['id']}}">
                        <button type="button" id="detail" class="btn btn-info" >
                          <i class="fa fa-eye"></i>
                        </button>
                    </a>
                    <a href="product/edit/{{$product['id']}}">
                        <button type="button" id="edit" class="btn btn-primary" >
                          <i class="fa fa-edit"></i>
                        </button>
                    </a>
                    <a href="product/list/{{$product['id']}}">
                        <button type="button" id="list" class="btn btn-secondary" >
                          <i class="fa  fa-list-ul"></i>
                        </button>
                    </a>
                    <button class="btn btn-danger" id="delete" data-id="{{$product['id']}}" type="submit">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>Mã nhãn hàng</th>
                  <th>Giới thiệu</th>
                  <th>Giá</th>
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
<script src="{{asset('assets/js/user.js')}}"></script>
<script>
  $(function () {
    // $('#example1').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
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
          url:'product/'+id,
          success: function(response){
            btn.parent().parent().remove();
            toastr.success(response.message);
          }
        })
      } else {
        swal("Sản phẩm chưa bị xóa!");
      }
    });
    
  })
</script>
@endsection