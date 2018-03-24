@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Nhãn hàng
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="">Sản phẩm</li>
    <li class="active">Nhãn hàng</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý nhãn hàng</h3>
            </div>
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Thêm nhãn hàng</button>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="flag">
                  <th>ID</th>
                  <th>Tên nhãn hàng</th>
                  <th>Mã nhãn hàng</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                <tr id="brand_{{$brand['id']}}" >
                  <td>{{$brand['id']}}</td>
                  <td>{{$brand['name']}}</td>
                  <td>{{$brand['code']}}</td>
                  <td>
                    <button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$brand['id']}}">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" id="delete" data-id="{{$brand['id']}}" type="submit">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên nhãn hàng</th>
                  <th>Mã nhãn hàng</th>
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
   
    <div class="modal modal-default fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Chỉnh sửa nhãn hàng</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="edit-brand" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Tên nhãn hàng</label>
                  <input type="text" class="form-control" name="name" id="ename" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="code">Mã nhãn hàng:</label>
                  <input type="text" class="form-control" name="code" id="ecode" value="">
                </div>
              </div>                
              <input type="hidden" class="form-control" name="id" id="eid" value="">       
            <div class="row">
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" >Lưu</button>
              </div>
            </div>

          </form>
          </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-default fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Thêm nhãn hàng</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="add-brand" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Tên nhãn hàng:</label>
                  <input type="text" class="form-control" name="name" id="aname" value="">
                </div>
              </div> 
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Mã nhãn hàng:</label>
                  <input type="text" class="form-control" name="code" id="acode" value="">
                </div>
              </div>                
            <div class="row">
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" >Lưu</button>
              </div>
            </div>

          </form>
          </div>
          
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
<!-- DataTables -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/brand.js')}}"></script>
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