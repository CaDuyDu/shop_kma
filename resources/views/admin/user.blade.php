@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    .red {
      color: red;
    }
</style>
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Khách hàng 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="active">Khách hàng</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý khách hàng</h3>
            </div>
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Thêm khách hàng</button>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="flag">
                  <th>ID</th>
                  <th>Họ và Tên</th>
                  <th>Email</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                <tr id="user_{{$user['id']}}" >
                  <td>{{$user['id']}}</td>
                  <td>{{$user['name']}}</td>
                  <td>{{$user['email']}}</td>
                  <td>
                    <button type="button" id="detail" class="btn btn-info" data-toggle="modal" data-target="#modal-primary" data-id="{{$user['id']}}">
                      <i class="fa fa-eye"></i>
                    </button>
                    <button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$user['id']}}">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" id="delete" data-id="{{$user['id']}}" type="submit">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Họ và Tên</th>
                  <th>Email</th>
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
    <div class="modal modal-primary fade" id="modal-primary">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Chi tiết khách hàng</h4>
          </div>
          <div class="modal-body">
            <table class="table table-hover">
              <thead>
              </thead>
              <tbody>
                <tr><td>Tên:</td><td id="vname"></td></tr>  
                <tr><td>Email:</td><td id="vemail"></td></tr>  
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal modal-default fade" id="modal-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Chi tiết khách hàng</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="edit-user" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Name:</label>
                  
                  <input type="text" class="form-control" name="name" id="ename" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="price">Email:</label>
                    <input type="text" class="form-control" name="email" id="eemail" value="">
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
            <h4 class="modal-title">Thêm khách hàng</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="add-user" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Name:</label>
                  @if ($errors->has('code'))
                      <span class="red">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                  <input type="text" class="form-control" name="name" id="aname" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="email">Email:</label>
                    @if ($errors->has('email'))
                        <span class="red">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="text" class="form-control" name="email" id="aemail" value="">
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="email">Password:</label>
                    @if ($errors->has('password'))
                        <span class="red">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input type="Password" class="form-control" name="password" id="apassword" value="">
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
<script src="{{asset('assets/js/user.js')}}"></script>
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