@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Danh sách sản phẩm chi tiết
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="active">Sản phẩm</li>
    <li class="active">Sản phẩm chi tiết</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lý sản phẩm chi tiết</h3>
            </div>
            <div class="box-header">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Thêm sản phẩm chi tiết</button>
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              <p id="code" style="display: none;">{{$code}}</p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr id="flag">
                  <th>ID</th>
                  <th>Mã sản phẩm chính</th>
                  <th>Size</th>
                  <th>Màu sắc</th>
                  <th>Số lượng</th>
                  <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                <tr id="product_{{$product['id']}}" >
                  <td>{{$product['id']}}</td>
                  <td id="code">{{$code}}</td>
                  <td>{{$product['size']}}</td>
                  <td>{!!$product['color']!!}</td>
                  <td>{{$product['quantity']}}</td>
                  <td>
                    <button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit" data-id="{{$product['id']}}">
                      <i class="fa fa-edit"></i>
                    </button>
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
                  <th>Mã sản phẩm chính</th>
                  <th>Size</th>
                  <th>Màu sắc</th>
                  <th>Số lượng</th>
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
            <h4 class="modal-title">Chỉnh sửa sản phẩm chi tiết</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="edit-product-detail" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="size">Size:</label>
                  
                  <input type="number" class="form-control" name="size" id="esize" value="" required="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="color">Màu sắc:</label>
                    <input type="text" class="form-control" name="color" id="ecolor" value="" required="">
                  </div>
                </div>
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="quantity">Số lượng:</label>
                  
                  <input type="number" class="form-control" name="quantity" id="equantity" value="" required="">
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
            <h4 class="modal-title">Thêm sản phẩm chi tiết cho sản phẩm {{$code}}</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="add-product-detail" style="width: 100%">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12"></div>
                <div class="form-group col-md-12">
                  <label for="size">Size:</label>
                  <input type="number" class="form-control" name="size" id="asize" value="" required="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="color">Màu sắc:</label>
                    <input type="text" class="form-control" name="color" id="acolor" value="" required="">
                  </div>
              </div>
              <div class="row">
                <div class="col-md-12"></div>
                  <div class="form-group col-md-12">
                    <label for="email">Số lượng:</label>
                    <input type="number" class="form-control" name="quantity" id="aquantity" value="" required="">
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
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  $(document).on('click','#edit',function(){
    var id = $(this).data('id');
    var btn = $(this);
    $.ajax({
      type:'get',
      url:'/admin/product-detail/edit/'+id,
      success:function(response){
        var res = response.data;
        $('#esize').val(res.size);
        $('#ecolor').val(res.color);
        $('#equantity').val(res.quantity);
        $('#eid').val(res.id);
      }
    })
  })
    $(document).on('submit','#edit-product-detail',function(e){
          e.preventDefault();
          var id = $('#eid').val();
          $.ajax({
            type:'put',
            data: {
              size:$('#esize').val(),
              color:$('#ecolor').val(),
              quantity:$('#equantity').val(),
            },
            url:'/admin/product-detail/'+id,
            success:function(response){
              var res = response.data;
              var code = $('#code').html();
              toastr.success('Cập nhật thành công');
              $('#modal-edit').modal('hide');
              var html = 
                      '<td>'+res.id+'</td>'+
                      '<td>'+code+'</td>'+
                      '<td>'+res.size+'</td>'+
                      '<td>'+res.color+'</td>'+
                      '<td>'+res.quantity+'</td>'+
                      '<td>'+
                      '<button type="button" id="edit" class="btn btn-primary" '+
                      'data-toggle="modal" data-target="#modal-edit" data-id="'+res.id+'"><i class="fa fa-edit"></i></button>'+
                      '<button class="btn btn-danger" id="delete" data-id="'+res.id+'" type="submit">'+
                      '<i class="fa fa-trash"></i></button>'+                  
                    '</td>';
                    
              $('#product_'+res.id).html(html);
            },error:function(xhr,ajaxOptions,thrownError) {
              alert('error');
              // toastr.error(xhr.status + ':' + thrownError);
              // console.log(xhr);
              // toastr.error(xhr.responseJSON.message);
            }
          })
  })

    $('#add-product-detail').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        type:'post',
        data: {
          size:$('#asize').val(),
          color:$('#acolor').val(),
          quantity:$('#aquantity').val(),
          product_id:{{$product_id}},
                  },
        url:'/admin/product-detail/store',
        success:function(response){
                        
                    
          var res = response.data;
          toastr.success(' thêm thành công');
          $('#modal-add').modal('hide');
          var flag = $('#flag');
          var code = $('#code').html();
          // var code = response.code;
          console.log(code);
          var html = '<tr>'+
                      '<td>'+res.id+'</td>'+
                      '<td>'+code+'</td>'+
                      '<td>'+res.size+'</td>'+
                      '<td>'+res.color+'</td>'+
                      '<td>'+res.quantity+'</td>'+
                      '<td>'+
                      '<button type="button" id="edit" class="btn btn-primary" '+
                      'data-toggle="modal" data-target="#modal-edit" data-id="'+res.id+'"><i class="fa fa-edit"></i></button>'+
                      '<button class="btn btn-danger" id="delete" data-id="'+res.id+'" type="submit">'+
                      '<i class="fa fa-trash"></i></button>'+                  
                    '</td>'+
                    '</tr>'
          $(html).insertAfter(flag);
        },error:function(xhr,ajaxOptions,thrownError) {
          // toastr.error(xhr.status + ':' + thrownError);
          // console.log(xhr);
          toastr.error(xhr.responseJSON.message);
        }

      })
    })
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
          url:'/admin/product-detail/'+id,
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