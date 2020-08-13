<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Online-Shop</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	  <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	  <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
</head><!--/head-->

<body>
  <div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="image/shop4.png" alt="" width="50%" height="10%"/></a>
						</div>
				  </div>
					<div class="col-sm-8">
    						<div class="shop-menu pull-right" >
    							<ul class="nav navbar-nav">
    								 <li>
    								     <a href="#"><i class="fa fa-user"></i>
            								@if(session('customer_name'))
            									{{session('customer_name')}}
            								@else
            									Account
            								@endif
    								     </a>
    								</li>
    								<li>
                    <a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
    								 @if(session('customer_id') && !session('shipping_id'))
    								<li><a href="{{url('/checkout')}}">Checkout</a></li>
    								@elseif(session('customer_id') && session('shipping_id'))
    								<li><a href="{{url('/payment')}}">Checkout</a></li>
    								@else
    								<li><a href="{{url('/login-check')}}">Checkout</a></li>
    								@endif
    								<li><a href="{{url('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart <span class="label label-danger">{{Cart::content()->count()}}</span> </a> </li>
    								@if(session('customer_id'))
    									<li><a href="{{url('customer-logout')}}"><i class="fa fa-lock"></i>Logout</a></li>
    								@else
    									<li><a href="{{url('login-check')}}"><i class="fa fa-lock"></i>Login</a></li>
    								@endif
    						</ul>
    					</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header" style="background-color:#adbec4;">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                    <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li>
										@if(session('customer_id') && !session('shipping_id'))
											<li><a href="{{url('/checkout')}}">Checkout</a></li>
										@elseif(session('customer_id') && session('shipping_id'))
											<li><a href="{{url('/payment')}}">Checkout</a></li>
										@else
											<li><a href="{{url('/login-check')}}">Checkout</a></li>
										@endif
										<li><a href="{{url('/show-cart')}}">Cart <span class="label label-danger">{{Cart::content()->count()}}</span> </a></li>
										@if(session('customer_id'))
											<li><a href="{{url('customer-logout')}}">Logout</a></li>
										@else
											<li><a href="{{url('login-check')}}">Login</a></li>
										@endif
                  </ul>
                </li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	@yield('slider')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php $all_category = DB::table('tbl_category')->get();
							foreach($all_category as $category){?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{url('/product-by-category/'.$category->category_id)}}">{{$category->category_name}}</a></h4>
									</div>
								</div>
							<?php }?>
						</div>
            <!--/category-products-->
            <!--brands_products-->
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php $all_manufacture = DB::table('tbl_manufacture')->get();
									foreach($all_manufacture as $manufacture) {?>
									<li><a href="{{url('/product-by-manufacture/'.$manufacture->manufacture_id)}}">{{$manufacture->manufacture_name}}</a></li>
									<?php }?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Services</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<!-- <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button> -->
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 Onlineshop Inc. All rights reserved.</p>
				</div>
			</div>
		</div>

	</footer>
  <!--/Footer-->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
  	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
  	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/dreamimage.js')}}"></script>
</body>
</html>
