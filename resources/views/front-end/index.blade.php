@extends('layouts.header-footer')
@section('content')
<!-- banner -->
	<div class="banner">
	
	
	<div class="banner-right">
					<ul id="flexiselDemo2">			
						<li><div class="banner-grid">
						<h2>Featured Products</h2>
						<div class="wome">
								<a href="single.html" ><img class="img-responsive" src="images/bi1.jpg" alt="" />
								</a>
								<div class="women simpleCart_shelfItem">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6 ><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p class="ba-price"><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>							
								</div>							
							</div></li>
						<li><div class="banner-grid">
						<h2>Featured Products</h2>
						<div class="wome">
								<a href="single.html" ><img class="img-responsive" src="images/bi.jpg" alt="" />
								</a>	
								<div class="women simpleCart_shelfItem">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6 ><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p class="ba-price"><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>						
								</div>						
							</div></li>
						<li><div class="banner-grid">
						<h2>Featured Products</h2>
						<div class="wome">
								<a href="single.html" ><img class="img-responsive" src="images/bi2.jpg" alt="" />
								</a>	
								<div class="women simpleCart_shelfItem">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6 ><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p class="ba-price"><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>						
								</div>						
							</div></li>
						
					
					</ul>
					<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo2").flexisel({
				visibleItems: 1,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 5000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 1
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 1
		    		}
		    	}
		    });
		    
		});
	</script>
		<script type="text/javascript" src="{{asset('js/jquery.flexisel.js')}}"></script>

					</div>

				
				</div>

	</div>
<!-- //banner -->
<!--content-->
		<div class="content">
		<div class="content-head">
					
					<div class="col-md-6 col-m1 animated wow fadeInLeft" data-wow-delay=".1s">
						<div class="col-1">
						<div class="col-md-6 col-2">
							<a href="single.html"><img src="images/pi3.jpg" class="img-responsive" alt="">
							</a></div>
							<div class="col-md-6 col-p">
								<h5>For All Collections</h5>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
								praesentium voluptatum deleniti atque</p>
								<a href="single.html" class="shop" data-hover="Shop Now">Shop Now</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="col-1">
						<div class="col-md-6 col-p">
								<h5>For All Collections</h5>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
								praesentium voluptatum deleniti atque</p>
								<a href="single.html" class="shop" data-hover="Shop Now">Shop Now</a>
							</div>
						<div class="col-md-6 col-2">
							<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt="">
							</a></div>
							<div class="clearfix"> </div>
						</div>
						</div>
					
					<div class="col-md-6 col-m2 animated wow fadeInRight" data-wow-delay=".1s">
					
						<!---->
						 <!-- requried-jsfiles-for owl -->
							<link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
							    <script src="{{asset('js/owl.carousel.js')}}"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo").owlCarousel({
									        items : 2,
									        lazyLoad : false,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  true,
									        pagination : false,
									      });
									    });
									  </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo" class="owl-carousel">
					                <div class="item">					                	 
										  
											<a href="single.html"><img class="img-responsive" src="images/bb.png" alt="" /></a>  
											<a href="single.html" class="shop-2" >Shop Now</a>
								
					                </div>
									<div class="item">					                	  
										
											<a href="single.html"><img class="img-responsive" src="images/bb1.png" alt="" /></a>  
											<a href="single.html" class="shop-2">Shop Now</a>									
																		
					                </div>
									
									<div class="item">					                	 
									
											<a href="single.html"><img class="img-responsive" src="images/bb.png" alt="" /> </a> 
											<a href="single.html" class="shop-2">Shop Now</a>									
																			
					                </div>
									<div class="item">					                	  
										
											<a href="single.html"><img class="img-responsive" src="images/bb1.png" alt="" /></a>  
											<a href="single.html" class="shop-2">Shop Now</a>									
																		
					                </div>
							</div>
					   </div>
					   <div class="clearfix"></div>
			</div>	
					</div>
				
			<!---->
			
				<div class="content-top">
					<div class="col-md-5 col-md1 animated wow fadeInLeft" data-wow-delay=".1s">
						<div class="col-3">
							<a href="single.html"><img src="images/pi1.jpg" class="img-responsive " alt="">
							<div class="col-pic">	
								<h5> Women's Wear</h5>
								<p>At vero eos et accusamus et</p>
							</div></a>
						</div>
						
					</div>
					<div class="col-md-7 col-md2 animated wow fadeInRight" data-wow-delay=".1s">
						@foreach($latest_products_2 as $product)
						<div class="col-sm-4 item-grid simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="/detail/{{$product->code}}">
											<div class="grid-img">
												<img  src="/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="img-responsive" alt="" style="height: 157px !important">
											</div>
											<div class="grid-img">
												<img  src="/images/products/details/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','0')->first()->link !!}" class="img-responsive"  alt="" style="height: 157px !important">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="/detail/{{$product->code}}">{{$product->name}}</a></h6>
									<p ><em class="item_price">{{$product->price}}$</em></p>
									{{-- <a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a> --}}
								</div>
							</div>
						</div>
						@endforeach
				
					</div>
					<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!----->
				<!---->
				<div class="content-top">
					
					<div class="col-md-7 col-md2 animated wow fadeInLeft" data-wow-delay=".1s">
						@foreach($latest_products_1 as $product)
						<div class="col-sm-4 item-grid simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="/detail/{{$product->code}}">
											<div class="grid-img">
												<img  src="/images/products/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="img-responsive" alt="" style="height: 157px !important">
											</div>
											<div class="grid-img">
												<img  src="/images/products/details/{!! App\Product::find($product->id)->imagesDetail->Where('is_thumbnail','0')->first()->link !!}" class="img-responsive"  alt="" style="height: 157px !important">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="/detail/{{$product->code}}">{{$product->name}}</a></h6>
									<p ><em class="item_price">{{$product->price}}$</em></p>
									{{-- <a href="{{asset('')}}addToCart/{{$product->code}}" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a> --}}
								</div>
							</div>
							
						</div>
						@endforeach
					<div class="clearfix"></div>
					</div>
					<div class="col-md-5 col-md1 animated wow fadeInRight" data-wow-delay=".1s">
						<div class="col-3">
							<a href="single.html"><img src="images/pi2.jpg" class="img-responsive " alt="">
							<div class="col-pic">
								<h5> Men's Wear</h5>
								<p>At vero eos et accusamus et</p>
							</div></a>
						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>
			
			
				<!--products-->
@endsection