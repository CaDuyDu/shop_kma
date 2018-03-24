<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>KMAShop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">      
		<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
		
		<link href="{{asset('css/bootstrappage.css')}}" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="{{asset('css/flexslider.css')}}" rel="stylesheet"/>
		<link href="{{asset('css/main.css')}}" rel="stylesheet"/>

		<!-- scripts -->
		<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>				
		<script src="{{asset('js/superfish.js')}}"></script>	
		<script src="{{asset('js/jquery.scrolltotop.js')}}"></script>
		<script src="{{asset('js/jquery.fancybox.js')}}"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">	
							@if(Illuminate\Support\Facades\Auth::guard(null)->check())			
							<li><a href="#">My Account</a></li>
							@endif
							<li><a href="cart.html">Your Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>
							@if(Illuminate\Support\Facades\Auth::guard(null)->check())
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                 Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>	

							@else
								<li><a href="/login" >Login</a></li>
								
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							@foreach($categories as $category)
								<li><a href="">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</nav>
				</div>
			</section>
			@yield('content')
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		@yield('script')
		
    </body>
</html>