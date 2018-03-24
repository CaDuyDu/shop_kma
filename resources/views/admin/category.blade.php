@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Danh mục
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="">Sản phẩm</li>
    <li class="active">Danh mục</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý danh mục</h3>
            </div>
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Thêm Danh mục</button>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="flag">
                  <th>ID</th>
                  <th>Tên danh mục</th>
                  <th>Mã danh mục</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                <tr id="category_{{$category['id']}}" >
                  <td>{{$category['id']}}</td>
                  <td>{{$category['name']}}</td>
                  <td>{{$category['code']}}</td>
                  <td>
                    <button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$category['id']}}">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-danger" id="delete" data-id="{{$category['id']}}" type="submit">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Tên danh mục</th>
                  <th>Mã danh mục</th>
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
            <h4 class="modal-title"> Chỉnh sửa danh mục</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="edit-category" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Tên danh mục</label>
                  <input type="text" class="form-control" name="name" id="ename" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="code">Mã danh mục:</label>
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
            <h4 class="modal-title">Thêm danh mục</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="add-category" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Tên danh mục:</label>
                  <input type="text" class="form-control" name="name" id="aname" value="">
                </div>
              </div> 
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="name">Mã danh mục:</label>
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
<script src="{{asset('assets/js/category.js')}}"></script>
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