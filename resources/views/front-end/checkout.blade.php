@extends('layouts.header-footer')
<!--banner-->
@section('content')
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Checkout</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.html">Home</a><label>/</label>Checkout</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
<div class="check-out">	 
	<div class="container">	 

				<table class="table animated wow fadeInLeft" data-wow-delay=".5s" border="1">
					<tr>
						<th class="t-head head-it ">Item</th>
						<th class="t-head">Price</th>

						<th class="t-head">Size</th>
						<th class="t-head">Color</th>
						<th class="t-head">Quantity</th>
						<th class="t-head">Total</th>
					</tr>

					@foreach($cart as $row)
					{{-- {{dd($value)}} --}}
					<tr class="cross" data-id="{{$row->rowId}}">
						<td class="ring-in t-data" >
							<a href="#" class="at-in">
								<img src="/images/products/{!! App\Product::find($row->id)->imagesDetail->Where('is_thumbnail','1')->first()->link !!}" class="img-responsive" alt="" style="width: 100px !important">
							</a>
							<div class="sed">
								<h5>{{$row->name}}</h5>
							</div>
							<div class="clearfix"> </div>
							<div class="close1 close"> </div>
						</td>
						<td class="t-data">${{number_format("$row->price",1,".","")}}</td>

						<td class="t-data">{{$row->options->size}}</td>
						<td class="t-data">{{$row->options->color}}</td>
						<td class="t-data">
							<div class="quantity"> 
								<div class="quantity-select">            
									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span class="span-1">{{$row->qty}}</span></div>									
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>

						</td>
						<td class="t-data" id="price{{$row->rowId}}">${!!  $row->qty*$row->price !!}</td>

					</tr>
					@endforeach
				</table>
				<div class="row">
				@if (count($errors) > 0)
				    	<div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
				    </div>
				    @elseif (Session()->has('flash_level'))
				    	<div class="alert alert-success">
					        <ul>
					            {!! Session::get('message') !!}	
					        </ul>
					    </div>
					@endif
				<form role="form" method="POST" action="{{Route('storeCart')}}">
					{{csrf_field()}}
				  <div class="col-xs-4">
				  	<h3>Thông tin khách hàng</h3><br><br>
				    
					  <div class="form-group">
					    <label for="name">Họ và tên (*)</label>
					    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required="">
					  </div>
					  <div class="form-group">
					    <label for="mobile">Điện thoại (*)</label>
					    <input type="number" class="form-control" id="mobile" name="mobile" required="" value="{{ old('mobile') }}" minlength="10" maxlength="11">
					    {{-- @if ($errors->has('mobile')) {
					    	<p>{!!$errors->first('mobile')!!}</p>  							
						}
						@endif --}}
					  </div>
					  <div class="form-group">
					    <label for="email">Email (*)</label>
					    <input type="email" class="form-control" id="email" name="email" required="" value="{{ old('email') }}">
					  </div>
					  <div class="form-group">
					  	<label for="address">Địa chỉ (*)</label>
					  	<textarea class="form-control" rows="3" id="address" name="address" required="">{{ old('address') }}</textarea>
					  </div>
					
				  </div>
				  <div class="col-xs-4">
				  	<h3>Hình thức thanh toán</h3><br><br>
				  	<label class="radio-inline">
					  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked=""> Tại nhà
					</label>
				  </div>
				  <div class="col-xs-4">
				  		<div class=" cart-total">

							<h5 class="continue" >Cart Total</h5>
							<div class="price-details">
								<h3>Price Details</h3>
								<span>Total</span>
								<span class="total1" id="total1">{{Gloudemans\Shoppingcart\Facades\Cart::total()}}</span>
								<span>Discount</span>
								<span class="total1">---</span>
								<span>Delivery Charges</span>
								<span class="total1">0.0</span>
								<div class="clearfix"></div>				 
							</div>	
							<ul class="total_price">
								<li class="last_price"> <h4>TOTAL</h4></li>	
								<li class="last_price" id="total2"><span>{{Gloudemans\Shoppingcart\Facades\Cart::total()}}</span></li>
								<div class="clearfix"> </div>
							</ul>
							<br>
							<button type="submit" class="btn btn-danger btn-lg">Produced By Cart</button>

						</div>
				  </div>
				  </form>
				</div>
				


			</div>
		</div>
		<!--quantity-->
		<script>
			$('.value-plus').on('click', function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var $rowId = $(this).parents('tr').data('id');
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
				$.ajax({
					type:'get',
					url:'plus/'+$rowId,
					success:function(response){
						var res = response.data;
						var qty = response.qty;				        
						var $price = res.price;
						var $quantity = parseInt($('#qty').html());
						var $totalCart = parseInt($('#totalCart').html());
						$totalId = qty*res.price;
						$qty = $quantity+1;
						$total = $totalCart+$price;
						$total = $total.toFixed(1);
						$totalId = $totalId.toFixed(1);
						$('#price'+res.rowId).html('$'+$totalId);
						$('#qty').html($qty);
						$('#totalCart').html($total);
						$('#total1').html($total);
						$('#total2').html($total);
					}
				})

				
			});

			$('.value-minus').on('click', function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var $rowId = $(this).parents('tr').data('id');
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) {
					$.ajax({
						type:'get',
						url:'minus/'+$rowId,
						success:function(response){
							var res = response.data;
							var qty = response.qty;
				        // $('.span-1').html(qty);				        
				        divUpd.text(newVal);
				        var $price = res.price;
				        var $quantity = parseInt($('#qty').html());
				        var $totalCart = parseInt($('#totalCart').html());
				        $totalId = qty*res.price;
				        $qty = $quantity-1;
				        $total = $totalCart-$price;
				        $total = $total.toFixed(1);
				        $totalId = $totalId.toFixed(1);
				        $('#price'+res.rowId).html('$'+$totalId);
				        $('#qty').html($qty);
				        $('#totalCart').html($total);
				        $('#total1').html($total);
				        $('#total2').html($total);
				    }
				})
				}
			});
		</script>
		<!--quantity-->
		<script>
			$(document).ready(function(c) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$('.close').on('click', function(c){
					var $tr = $(this).parents('tr');
					var $rowId = $(this).parents('tr').data('id');
					$.ajax({
						type:'get',
						url:'deleteProductInCart/'+$rowId,
						success:function(response){
							var res = response.cartDelete;			    
							var $qty = parseInt(res.qty);

							var $total = parseInt(res.qty)*parseInt(res.price);

							var $quantity = parseInt($('#qty').html());
							var $totalCart = parseInt($('#totalCart').html());
							$qty = $quantity-$qty;
							$total = $totalCart-$total;
							$total = $total.toFixed(1);
							$('#qty').html($qty);
							$('#totalCart').html($total);
							$('#total1').html($total);
							$('#total2').html($total);
							$tr.fadeOut('slow', function(c){
								$tr.remove();
							});
						}
					})
					
				});	  
			});
		</script>
		@endsection