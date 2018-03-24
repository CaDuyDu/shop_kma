@extends('layouts.header_footer')
@section('content')
	<section class="header_text sub">
		<img class="pageBanner" src="images/pageBanner.png" alt="New products" >
			<h4><span>Product Detail</span></h4>
		</section>
		<section class="main-content">				
			<div class="row">						
				<div class="span9">
					<div class="row">
						<div class="span4">
							<a href="/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="thumbnail"  ><img alt="" src="/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}"></a>												
							<ul class="thumbnails small">	
								@foreach($images_detail as $image)						
								<li class="span1">
									<a href="/images/products/details/{{$image->link}}" class="thumbnail" data-fancybox-group="group1"><img src="/images/products/details/{{$image->link}}" alt=""></a>
								</li>
								@endforeach
							</ul>
						</div>
						<div class="span5">
							<address>
								<strong>Nhà sản xuất:</strong> <span>{!! App\brand::find($product->brand_id)->name!!}</span><br>
								<strong>Mã sản phẩm:</strong> <span>{{$product->code}}</span><br>
								<strong>Tên sản phẩm:</strong> <span>{{$product->name}}</span><br>
								<strong>Tình trạng:</strong> <span>Còn hàng</span><br>								
							</address>									
							<h4><strong>Giá: {{$product->price}} VND</strong></h4>
						</div>
						<div class="span5">
								
							<form action="" method="POST" class="form-inline" id="addToCart">
								{{csrf_field()}}
								<strong>Size: </strong>
								<select name="size" id="size" required="">
										<option value="">------------------size------------------</option>
									@foreach($size as $key=>$value)
										<option value="{!!$key!!}">{!!$key!!}</option>
									@endforeach
								</select>
								<br><br>
								<strong>Màu</strong>
								<select name="color" id="color" required="">
									<option value="">-----------------color---------------</option>
									@foreach($colors as $key=>$value)
										<option value="{!!$key!!}">{!!$key!!}</option>
									@endforeach
								</select>
								<p>&nbsp;</p>
								<label>Qty:</label>
								<input type="text" class="span1" placeholder="1" id="quantity" name="quantity" required="">
								<input type="text" name="code" id="code" value="{{$product->code}}" style="display: none">
								<button class="btn btn-inverse" type="submit">Thêm vào giỏ hàng</button>
							</form>
						</div>							
					</div>
					<div class="row">
						<div class="span9">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active"><a href="#home">Giới thiệu</a></li>
								<li class=""><a href="#profile">Thông tin</a></li>
							</ul>							 
							<div class="tab-content">
								<div class="tab-pane active" id="home">{!!$product->description!!}</div>
								<div class="tab-pane" id="profile">
									<table class="table table-striped shop_attributes">	
										<tbody>
											<tr class="">
												<th>Size</th>
												<td>
													@foreach($size as $key=>$value)
														<span>{!!$key!!} ,</span>
													@endforeach
												</td>
											</tr>		
											<tr class="alt">
												<th>Color</th>
												<td>
													@foreach($colors as $key=>$value)
													 <span>{!!$key!!} ,</span> 
													@endforeach
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>							
						</div>						
						<div class="span9">	
							<br>
							<h4 class="title">
								<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel-1" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="/images/ladies/6.jpg"></a><br/>
													<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$341</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="/images/ladies/5.jpg"></a><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Phasellus consequat</a>
													<p class="price">$341</p>
												</div>
											</li>       
											<li class="span3">
												<div class="product-box">												
													<a href="product_detail.html"><img alt="" src="/images/ladies/4.jpg"></a><br/>
													<a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
													<a href="#" class="category">Erat gravida</a>
													<p class="price">$28</p>
												</div>
											</li>												
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="/images/ladies/1.jpg"></a><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Phasellus consequat</a>
													<p class="price">$341</p>
												</div>
											</li>       
											<li class="span3">
												<div class="product-box">												
													<a href="product_detail.html"><img alt="" src="/images/ladies/2.jpg"></a><br/>
													<a href="product_detail.html">Praesent tempor sem</a><br/>
													<a href="#" class="category">Erat gravida</a>
													<p class="price">$28</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="/images/ladies/3.jpg"></a><br/>
													<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$341</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="span3 col">
					<div class="block">	
						<ul class="nav nav-list">
							<li class="nav-header">SUB CATEGORIES</li>
							<li><a href="products.html">Nullam semper elementum</a></li>
							<li class="active"><a href="products.html">Phasellus ultricies</a></li>
							<li><a href="products.html">Donec laoreet dui</a></li>
							<li><a href="products.html">Nullam semper elementum</a></li>
							<li><a href="products.html">Phasellus ultricies</a></li>
							<li><a href="products.html">Donec laoreet dui</a></li>
						</ul>
						<br/>
						<ul class="nav nav-list below">
							<li class="nav-header">MANUFACTURES</li>
							<li><a href="products.html">Adidas</a></li>
							<li><a href="products.html">Nike</a></li>
							<li><a href="products.html">Dunlop</a></li>
							<li><a href="products.html">Yamaha</a></li>
						</ul>
					</div>
					<div class="block">
						<h4 class="title">
							<span class="pull-left"><span class="text">Randomize</span></span>
							<span class="pull-right">
								<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
							</span>
						</h4>
						<div id="myCarousel" class="carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul class="thumbnails listing-products">
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>												
												<a href="product_detail.html"><img alt="" src="/images/ladies/7.jpg"></a><br/>
												<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
												<a href="#" class="category">Suspendisse aliquet</a>
												<p class="price">$261</p>
											</div>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul class="thumbnails listing-products">
										<li class="span3">
											<div class="product-box">												
												<a href="product_detail.html"><img alt="" src="/images/ladies/8.jpg"></a><br/>
												<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
												<a href="#" class="category">Urna nec lectus mollis</a>
												<p class="price">$134</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="block">								
						<h4 class="title"><strong>Best</strong> Seller</h4>								
						<ul class="small-product">
							<li>
								<a href="#" title="Praesent tempor sem sodales">
									<img src="/images/ladies/1.jpg" alt="Praesent tempor sem sodales">
								</a>
								<a href="#">Praesent tempor sem</a>
							</li>
							<li>
								<a href="#" title="Luctus quam ultrices rutrum">
									<img src="/images/ladies/2.jpg" alt="Luctus quam ultrices rutrum">
								</a>
								<a href="#">Luctus quam ultrices rutrum</a>
							</li>
							<li>
								<a href="#" title="Fusce id molestie massa">
									<img src="/images/ladies/3.jpg" alt="Fusce id molestie massa">
								</a>
								<a href="#">Fusce id molestie massa</a>
							</li>   
						</ul>
					</div>
				</div>
			</div>
		</section>	
		<div class="modal fade" id="modal-add" role="dialog" style="display: none">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Đã thêm vào giỏ hàng</h4>
		        </div>
		        <div class="modal-body">
		        	<div class="container" style="width: 100%">		
		          		<div class="">
			          		<div  style="float: left; width: 50%">
			          			<div  id="images"><img src="/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="thumbnail" width="100%"></div> 
			          		</div>
			          		<div style="float: left; width: 50%">
			          			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, sequi!
			          			<button type="button" class="btn btn-default" data-dismiss="modal">Tiếp tục chọn hàng</button>
			          		</div>
		          		</div>
		          	</div>
		        </div>
		      </div>
		      
		    </div>
		  </div>		
@endsection
@section('script')
	<script src="{{asset('js/common.js')}}"></script>
	<script>
		$(function () {
			$('#myTab a:first').tab('show');
			$('#myTab a').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
			})
		})
		$(document).ready(function() {
			// $('.thumbnail').fancybox({
			// 	openEffect  : 'none',
			// 	closeEffect : 'none'
			// });
			
			$('#myCarousel-2').carousel({
                interval: 2500
            });								
		});
		$('#size').on('change',function(){
			$size1=$('#size').val();

		})
	</script>
	<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

    $(document).on('submit','#addToCart',function(e){
          e.preventDefault();
          var code = $('#code').val();
          $.ajax({
            type:'POST',
            data: {
              size:$('#size').val(),
              color:$('#color').val(),
              quantity:$('#quantity').val(),
              code:$('#code').val(),
            },
            url:'/addToCart/'+code,
            success:function(response){
              var res = response.data;
              
              // toastr.success('Cập nhật thành công');
              $('#modal-add').modal('show');
            },error:function(xhr,ajaxOptions,thrownError) {
              
              // toastr.error(xhr.status + ':' + thrownError);
              console.log(xhr);
              // toastr.error(xhr.responseJSON.message);
            }
          })
  })
	</script>
@endsection