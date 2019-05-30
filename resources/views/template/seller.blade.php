<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign up</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	 <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"> 
<!--===============================================================================================-->
<!-- Adding oh-autoVal css style -->
<link rel="stylesheet" type="text/css" href="jsval/oh-autoval-style.css">
<!-- Adding jQuery script. It must be before other script files -->
<script src="jsval/jquery.min.js"> </script>
<!-- Adding oh-autoVal script file -->
<script src="jsval/oh-autoval-script.js"></script>
<script>
								function validate()
								{
									var password=document.getElementById("p1").value;
									var cpass=document.getElementById("p2").value;
									if(password!=cpass)
									{
										alert("Passwords do not match...");
										return false;
									}
									
return true;
								}
</script>

</head>
<body class="form-v2" class="animsition">



<!-- Header -->
<header class="header1">
		<!-- Header desktop -->
		

			<div class="wrap_header">
				<!-- Logo -->
				<a href="/" class="logo">
				<h1><b>	Nearby Stores</b></h1>
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/">Home</a>
								<!-- <ul class="sub_menu">
									<li><a href="index.html">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li> 
								</ul> -->
							</li>

							<li class="sale-noti">
								<a href="#">Shop</a>
							</li>

							<!-- <li class="sale-noti">
								<a href="product.html">Sale</a>
							</li> -->

							<!-- <li>
								<a href="cart.html">Features</a>
							</li>

							<li>
								<a href="blog.html">Blog</a>
							</li> -->

							<li>
								<a href="/about">About</a>
							</li>

							<li>
								<a href="/contact">Contact</a>
							</li>
							<ul class="main_menu">
							<li>
								<a href="#">Sign up</a>
								 <ul class="sub_menu">
									<li><a href="/seller">Seller</a></li>
									<li><a href="/signup">Customer</a></li>
									
								</ul> 
							</li>
							<li>
								<a href="/signin">Sign in</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				
		
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/oo.jpg);">
		<h2 class="l-text2 t-center">
		SIGN UP
		</h2>
	</section>

	<div class="page-content">
		<div class="form-v2-content">
			<div class="form-left" >
				<img src="images/ssa.jpg" alt="form" width="400" height="1200" style="margin-top:-1px;">
				
			</div>
			<form class="form-detail" action="/register" method="post" id="myform">
			@csrf
				<h2>SELLER</h2>

				@if ($errors->has('email'))
                                    <span  role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
				<div class="form-row">
					<label for="full-name"> Name:</label>
					<input type="text" name="name" id="full_name" class="input-text av-name" placeholder="Enter name" av-message="Enter valid name"  autocomplete="off" required>
				</div>
				<div class="form-row">
					<label for="full-name"> Shop Name:</label>
					<input type="text" name="name" id="full_name" class="input-text av-name" placeholder="Enter name" av-message="Enter valid name"  autocomplete="off" required>
				</div>
				<div class="form-row">
					<label for="full-name"> License Number:</label>
					<input type="text" name="name" id="full_name" class="input-text av-name" placeholder="Enter name" av-message="Enter valid name"  autocomplete="off" required>
				</div>
				<div class="form-row">
					<label for="full-name"> Place:</label>
					<input type="text" name="name" id="full_name" class="input-text av-name" placeholder="Enter name" av-message="Enter valid name"  autocomplete="off" required>
				</div>
				<div class="form-row">
					<label for="full-name"> License Number:</label>
					<input type="text" name="name" id="full_name" class="input-text av-name" placeholder="Enter name" av-message="Enter valid name"  autocomplete="off" required>
				</div>
				<div class="form-row">
					<label for="your_email">Your Email:</label>
					<input type="text" name="email" id="your_email" class="input-text av-email" av-message="Enter valid email" placeholder="Enter e-mail" required>
				
				
				</div>
				<div class="form-row">
					<label for="password">Password:</label>
                    <input type="password" name="password" id="p1" class="input-text av-password" required  placeholder="Enter your password" av-message="Invalid Password"><br>
                 <div style="font-weight: 900;color:#17202A  ;font-size: 12px;margin-top:-10px;"> * Password must contain uppercase,lowercase,special chars,digits and minimum 6 chars. * </div>
				</div>
				<div class="form-row">
					<label for="comfirm-password">Confirm Password:</label>
					<input type="password" name="cpass" id="p2" class="input-text" required  placeholder="Re-enter your password">
				</div>
				<input type="hidden" name="type" value="1"/> 
				<!-- <div class="form-checkbox">
					<label class="container"><p>By signing up, you agree to the <a href="#" class="text">Play Term of Service</a></p>
					  	<input type="checkbox" name="agree" id="agree">
					  	<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register" onClick="return validate()">
					<!-- <input type="submit" value="test"> -->
				</div>
			</form>
		</div>
    </div>
    <!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
			Fashe 
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>