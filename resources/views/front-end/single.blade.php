@extends('layouts.header-footer')
@section('content')
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Single</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.html">Home</a><label>/</label>Single</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
		<div class="col-md-3 product-bottom ">
			<!--categories-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Categories</h3>
					<ul class="cate">
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Best Selling</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Man</a> <span>(16)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Coats &amp; Jackets</a> <span>(5)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Jeans</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Suits</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
							</ul>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Sales</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Woman</a> <span>(15)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Dresses</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Shorts</a> <span>(4)</span></li>
							</ul>
					</ul>
				</div>
		<!--//menu-->
		<!--price-->
				<div class="price animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Price Range</h3>
					<div class="price-head">
					<div class="col-md-6 price-head1">
                                        <div class="price-top1">
                                            <span class="price-top">$</span>
                                            <input type="text"  value="0">
                                        </div>
                                    </div>
									<div class="col-md-6 price-head2">
                                        <div class="price-top1">
                                            <span class="price-top">$</span>
                                            <input type="text"  value="500">
                                        </div>
                                    </div>
									<div class="clearfix"></div>
                                    </div>
                                    </div>
			<!--//price-->
			<!--colors-->
			<div class="colors animated wow fadeInLeft animated" data-wow-delay=".5s" >
					<h3>Colors</h3>

                                        <div class="color-top">
                                            <ul>
											<li><a href="#"><i></i></a></li>
												<li><a href="#"><i class="color1"></i></a></li>
												<li><a href="#"><i class="color2"></i></a></li>
												<li><a href="#"><i class="color3"></i></a></li>
												<li><a href="#"><i class="color4"></i></a></li>
												<li><a href="#"><i class="color5"></i></a></li>
												<li><a href="#"><i class="color6"></i></a></li>
												<li><a href="#"><i class="color7"></i></a></li>
											</ul>
                                        </div>
                                    </div>
									
                                 
			<!--//colors-->
			<div class="sellers animated wow fadeInDown" data-wow-delay=".5s">
					
								<h3 class="best">BEST SELLERS</h3>
					<div class="product-head">
					<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.html"><img class="img-responsive " src="{{asset('')}}images/pcc.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.html">Lorem ipsum </a></h6>
								<span class=" price-in1"> <del>$50.00</del>$40.00</span>
								<p>The standard chunk of Lorem Ipsum used</p>
							</div>
								
							<div class="clearfix"> </div>
							</div>
							<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.html"><img class="img-responsive " src="{{asset('')}}images/pcc1.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.html">Lorem ipsum </a></h6>
								<span class=" price-in1"> <del>$50.00</del>$40.00</span>
								<p>The standard chunk of Lorem Ipsum used</p>
							</div>
							<div class="clearfix"> </div>
							</div>
							
							</div>
				</div>
				<!---->
 	</div>
			<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">
				<div class="col-md-5 grid-im">		
		<div class="flexslider">
			  <ul class="slides">
			  	@foreach($images_detail as $image)
			    <li data-thumb="{{asset('')}}/images/products/details/{{$image->link}}">
			        <div class="thumb-image"> <img src="{{asset('')}}/images/products/details/{{$image->link}}" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    @endforeach
			    {{-- <li data-thumb="{{asset('')}}/images/si1.jpg">
			         <div class="thumb-image"> <img src="{{asset('')}}/images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="{{asset('')}}/images/si2.jpg">
			       <div class="thumb-image"> <img src="{{asset('')}}/images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>  --}}
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
						<div class="span_2_of_a1 simpleCart_shelfItem">
				<h3>{{$product->name}}</h3>
				<p class="in-para"> {!! App\brand::find($product->brand_id)->name!!}</p>
			    <div class="price_single">
				  <span class="reducedfrom item_price">{{$product->price}}$</span><br><br>
				  <hr>
				  <form action="{{asset('')}}addToCart/{{$product->code}}" method="POST" class="form-inline" id="addToCart">
					{{csrf_field()}}
					<strong>Size: </strong>
					<select name="size" id="size" required="">
							<option value="">---------------size--------------</option>
						@foreach($size as $key=>$value)
							<option value="{!!$key!!}">{!!$key!!}</option>
						@endforeach
					</select>
					<br><br>
					<strong>Màu</strong>
					<select name="color" id="color" required="">
						<option value="">---------------color-------------</option>
						@foreach($colors as $key=>$value)
							<option value="{!!$key!!}">{!!$key!!}</option>
						@endforeach
					</select>
					<p>&nbsp;</p>
					<label>Qty:</label>
					<select name="quantity" id="quantity">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
					</select>
					{{-- <input type="text" class="span1" placeholder="1" id="quantity" name="quantity" required=""> --}}
					<input type="text" name="code" id="code" value="{{$product->code}}" style="display: none">
					<hr>
					<button  class=" btn btn-inverse"  type="submit">Add To Cart</button>
				</form>
				 {{-- <a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a> --}}
				 <div class="clearfix"></div>
				</div>
			<div class="clearfix"> </div>
			</div>
		   <!----- tabs-box ---->
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
									<div class="facts">
									  <p >{!!$product->description!!}</p>
										       
							        </div>

							    	</div>
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts1">
					
						<div class="color"><p>Color</p>
							@foreach($colors as $key=>$value)
							 	<span>{!!$key!!} ,</span> 
							@endforeach
							<div class="clearfix"></div>
						</div>
						<div class="color">
							<p>Size</p>
							@foreach($size as $key=>$value)
								<span>{!!$key!!} ,</span>
							@endforeach
							<div class="clearfix"></div>
						</div>
					        
			 </div>

								</div>									
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									 <div class="comments-top-top">
				<div class="top-comment-left">
					<img class="img-responsive" src="{{asset('')}}/images/co.png" alt="">
				</div>
				<div class="top-comment-right">
					<h6><a href="#">Hendri</a> - September 3, 2014</h6>
					
									<p>Wow nice!</p>
				</div>
				<div class="clearfix"> </div>
				<a class="add-re" href="single.html">Add Review</a>
			</div>


							 </div>
					      </div>
					 </div>
					 <script src="{{asset('js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
<!---->
					</div>
			
</div>
<script src="{{asset('js/imagezoom.js')}}"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>

<div class="clearfix"> </div>
<div class=" col-md-si">
	@foreach($products as $product)
	<div class="col-sm-4 item-grid simpleCart_shelfItem">
		<div class="grid-pro">
			<div  class=" grid-product " >
				<figure>		
					<a href="/detail/{{$product->code}}">
						<div class="grid-img">
							<img  src="{{asset('')}}/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="img-responsive" alt="" style="height: 157px !important">
						</div>
						<div class="grid-img">
							<img  src="{{asset('')}}/images/products/details/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','0')->first()->link !!}" class="img-responsive"  alt="" style="height: 157px !important">
						</div>			
					</a>		
				</figure>	
			</div>
			<div class="women">
				<a href="#"><img src="{{asset('')}}/images/ll.png" alt=""></a>
				<h6><a href="single.html">{{$product->name}}</a></h6>
				<p ><em class="item_price">{{$product->price}}$</em></p>
				<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
			</div>
		</div>
	</div>
	@endforeach

	<div class="clearfix"> </div>
	</div>
		</div class="clearfix"></div>
		</div>			
	</div>
@endsection