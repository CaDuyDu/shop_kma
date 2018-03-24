@extends('layouts.admin_header_footer')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .red {
    color: red;
  }
  
</style>
@endsection
@section('content')
 <section class="content-header">
  <h1>
    Thêm sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="active">Thêm sản phẩm</li>
  </ol>
</section>
<section class="content">
   <form action="{{Route("storeProduct")}}" method="POST" role="form" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form">
              {{ csrf_field() }} --}}
              <div class="box-body">
                <div class="form-group">
                    <label for="input-id">Chọn danh mục(<span class="red">*</span>)</label>
                    @if ($errors->has('category'))
                        <span class="red">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                    <select name="category" id="category" required class="form-control">
                      <option value="">--Chọn danh mục--</option>
                      @foreach($categories as $category)
                        <option value="{!!$category->id!!}" >{{$category->name}}</option>   
                      @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-id">Chọn nhãn hiệu(<span class="red">*</span>)</label>
                    @if ($errors->has('brand'))
                        <span class="red">
                            <strong>{{ $errors->first('brand') }}</strong>
                        </span>
                    @endif
                    <select name="brand" id="brand" required class="form-control">
                      <option value="">--Chọn nhãn hiệu---</option>
                      @foreach($brands as $brand)
                        <option value="{!!$brand->id!!}" >{{$brand->name}}</option>   
                      @endforeach 
                    </select>
                </div>
                <div class="form-group">
                  <label for="code">Mã sản phẩm(<span class="red">*</span>)</label>
                  <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="Nhập mã sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="name">Tên sản phẩm(<span class="red">*</span>)</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="price">Giá sản phẩm(<span class="red">*</span>)</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Nhập giá" required>
                </div>
                <div class="box box-info">
                  <div class="box-header">
                    <h3 class="box-title">Giới thiệu sản phẩm(<span class="red">*</span>)
                    </h3>
                    <!-- tools box -->
                    <!-- /. tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <form>
                          <textarea id="description" name="description" rows="10" cols="80" required>
                          </textarea>
                    </form>
                  </div>
                </div>
                <!-- /.box -->

                
                <div class="form-group">
                  <label for="txtimg">Ảnh đại diện(<span class="red">*</span>)</label>
                 
                  <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}"  required="required" class="form-control">
                    
                  <p class="help-block">Ảnh lớn của sản phẩm.</p>
                </div>
                <div class="form-group">
                  <label for="input-id">Hình ảnh chi tiết(<span class="red">*</span>)</label><br>
                      @for( $i=1; $i<=3; $i++)
                          <b>Hình ảnh chi tiết {!!$i!!}</b>(<span class="red">*</span>) : <input type="file" name="txtdetail_img[]" value="{{ old('txtdetail_img[]') }}" accept="image/png" id="inputtxtdetail_img" class="form-control" required>
                      @endfor                                  
                </div>
              </div>
              
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            
          </div>
        </div>
      </div>
   </form>
</section>
@endsection
@section('script')
<!-- DataTables -->
<script>
  $(function () {
    // Replace the <textarea id="description"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

@endsection