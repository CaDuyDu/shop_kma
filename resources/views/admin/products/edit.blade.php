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
    Chỉnh sửa sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li class="">Sản phẩm</li>
    <li class="active"> Chỉnh sửa sản phẩm</li>
  </ol>
</section>
<section class="content">
   <form action="/admin/product/{{$product->id}}" method="POST" role="form" enctype="multipart/form-data">
      {{ csrf_field() }} 
      {{method_field('PUT')}}
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chỉnh sửa sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form">
              {{ csrf_field() }} --}}
              <div class="box-body">
                <div class="form-group">
                    <label for="input-id">Chọn danh mục(<span class="red">*</span>)</label>
                    <select name="category" id="category" required class="form-control">
                      {{-- <option value="">{{$product->category_id}}</option> --}}
                      @foreach($categories as $category)
                        <?php
                          if($category->id == $product->category_id){
                            ?>
                            <option class="active" value="{!!$category->id!!}" >{{$category->name}}</option>  
                        <?php

                          }
                          else {
                            ?>
                            <option value="{!!$category->id!!}" >{{$category->name}}</option>
                        <?php
                          }
                        ?>
                        {{-- <option value="{!!$category->id!!}" >{{$category->name}}</option>    --}}
                      @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="input-id">Chọn nhãn hiệu(<span class="red">*</span>)</label>
                    <select name="brand" id="brand" required class="form-control">
                      @foreach($brands as $brand)
                        <?php
                          if($brand->id == $product->brand_id){
                            ?>
                            <option class="active" value="{!!$brand->id!!}" >{{$brand->name}}</option>  
                        <?php

                          }
                          else {
                            ?>
                            <option value="{!!$brand->id!!}" >{{$brand->name}}</option> 
                        <?php
                          }
                        ?>                       
                      @endforeach 
                    </select>
                </div>
                <div class="form-group">
                  <label for="code">Mã sản phẩm(<span class="red">*</span>)</label>
                  <input type="text" class="form-control" id="code" name="code" value="{{$product->code}}" placeholder="Nhập mã sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="name">Tên sản phẩm(<span class="red">*</span>)</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $product->name}}" placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="form-group">
                  <label for="price">Giá sản phẩm(<span class="red">*</span>)</label>
                  <input type="number" class="form-control" id="price" name="price"  value="{{ $product->price }}" placeholder="Nhập giá" required>
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
                          <textarea id="description" name="description"  rows="10" cols="80" required>
                            {!! $product->description !!}
                          </textarea>
                    </form>
                  </div>
                </div>
                <!-- /.box -->

                <div class="form-group">
                  <table class="table">
                    <tr>
                      <th>Ảnh đại diện cũ:</th>
                      <td><img src="{!! url('images/products/'.$thumbnail->link) !!}" alt="" width="169" height="220" style="border:1px solid gray"></td></td>
                    </tr>
                    <tr>
                      <th>Hình ảnh chi tiết cũ: </th>
                      <td>@foreach($images as $image)
                          <img src="{!! url('images/products/details/'.$image->link) !!}" alt="" width="100" height="100" style="display: inline-block;margin-right: 50px;border:1px solid gray">
                    @endforeach</td>
                    </tr>
                  </table>
                </div>
                               
                <div class="form-group">
                  
                  <label for="txtimg">Ảnh đại điện mới</label>
                 
                  <input type="file" name="txtimg" accept="image/png" id="inputtxtimg" value="{{ old('txtimg') }}" class="form-control">
                    
                  <p class="help-block">Ảnh lớn của sản phẩm.</p>
                </div>
                <div class="form-group">
                  <label for="input-id">Hình ảnh chi tiết mới</label><br>
                  
                      @for( $i=1; $i<=3; $i++)
                          <b>Hình ảnh chi tiết {!!$i!!}</b> : <input type="file" name="txtdetail_img_{{$i}}" value="{{ old('txtdetail_img[]') }}" accept="image/png" id="inputtxtdetail_img" class="form-control">
                      @endfor 
                                  
                </div>
              </div>
              
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
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