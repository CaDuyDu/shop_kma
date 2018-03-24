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
    Chi tiết sản phẩm
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
    <li> Sản phẩm</li>
    <li class="active"> Chi tiết phẩm</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chi tiết sản phẩm</h3>
            </div>
              <div class="box-body">
                <table class="table table-bordered ">
                
                <tr>
                  <th>ID</th>
                  <td>{{$product->id}}</td>
                </tr>
                <tr>
                  <th>Tên sản phẩm</th>
                  <td>{{$product->name}}</td>
                </tr>
                <tr>
                  <th>Mã sản phẩm</th>
                  <td>{{$product->code}}</td>
                </tr>
                <tr>
                  <th>Thương hiệu</th>
                  <td>{!! DB::table('brands')->where('id','=',$product->brand_id)->first()->name !!}</td>
                </tr>
                <tr>
                  <th>Danh mục</th>
                  <td>{!! DB::table('categories')->where('id','=',$product->category_id)->first()->name !!}</td>
                </tr>
                <tr>
                  <th>Giới thiệu sản phẩm</th>
                  <td>{!!$product->description!!}</td>
                </tr>
                <tr>
                  <th>Giá sản phẩm</th>
                  <td>{{$product->price}} VND</td>
                </tr>
                <tr>
                  <th>Ảnh đại diện</th>
                  <td>
                    <img src="{!! url('images/products/'.$thumbnail->link) !!}" alt="" width="169" height="220" style="border:1px solid gray"></td>
                </tr>
                <tr>
                  <th>Ảnh chi tiết</th>
                  <td>
                    @foreach($images as $image)
                          <img src="{!! url('images/products/details/'.$image->link) !!}" alt="" width="100" height="100" style="display: inline-block;margin-right: 50px;border:1px solid gray">
                    @endforeach
                  </td>
                </tr>
               
              </table>
              <div class="box-footer">
                <a href="/admin/product/edit/{{$product->id}}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                <button class="btn btn-info">Xem sản phẩm chi tiết</button>
              </div>
              </div>
              
          </div>
        </div>
      </div>
</section>
@endsection
