

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Home</title>
	<link rel="icon" href="user/assets/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="user/assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="user/assets/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="user/assets/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="user/assets/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="user/assets/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="user/assets/vendors/owl-carousel/owl.carousel.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="user/assets/css/style.css">
<style>
    /* ================= ELITE VIP GREEN GLASS PRODUCT CARD ================= */
.card-product {
  position: relative;
  border-radius: 25px;
  overflow: hidden;
  background: rgba(255, 255, 255, 0.3); /* half white */
  backdrop-filter: blur(14px) saturate(160%) hue-rotate(90deg); /* greenish glass */
  border: 1px solid rgba(0,128,0,0.25);
  box-shadow: 0 15px 40px rgba(0,128,0,0.25);
  transition: all 0.8s cubic-bezier(.19,1,.22,1);
}

.card-product:hover {
  transform: translateY(-15px) scale(1.06) rotate(-1deg);
  box-shadow: 0 35px 80px rgba(0,255,0,0.35);
}

/* IMAGE CINEMATIC */
.card-product__img img {
  border-radius: 20px;
  width: 100%;
  height: 250px;
  object-fit: cover;
  transition: transform 1s cubic-bezier(.19,1,.22,1),
              filter 0.6s ease, box-shadow 0.6s ease;
}

.card-product:hover .card-product__img img {
  transform: scale(1.2) rotate(-1deg);
  filter: brightness(1.1) contrast(1.05) hue-rotate(20deg);
  box-shadow: 0 15px 45px rgba(0,255,0,0.25);
}

/* GOLD/GREEN LIGHT SWEEP ANIMATION */
.card-product::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, transparent 30%, rgba(0,255,0,0.2), transparent 70%);
  transform: translateX(-120%);
  transition: 1s ease;
}

.card-product:hover::before {
  transform: translateX(120%);
}

/* ICON OVERLAY */
.card-product__imgOverlay {
  background: rgba(255,255,255,0.2);
  transition: background 0.4s ease;
}

.card-product__imgOverlay i {
  background: radial-gradient(circle,#00ff00,#006400);
  color: #000;
  padding: 14px;
  border-radius: 50%;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.card-product__imgOverlay i:hover {
  transform: scale(1.3) rotate(15deg);
  box-shadow: 0 5px 20px rgba(0,255,0,0.45);
}

/* SLIDER PANEL */
.card-slider {
  position: absolute;
  inset: 0;
  background: rgba(255,255,255,0.25);
  backdrop-filter: blur(16px) saturate(160%) hue-rotate(90deg);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  transform: translateY(100%);
  transition: transform 0.75s cubic-bezier(.19,1,.22,1);
  padding: 26px;
}

.card-product:hover .card-slider {
  transform: translateY(0);
}

/* STAGGERED TEXT */
.card-slider > * {
  opacity: 0;
  transform: translateY(25px);
  transition: all 0.6s ease;
}

.card-product:hover .card-slider > * {
  opacity: 1;
  transform: translateY(0);
}

.card-product:hover .card-slider > *:nth-child(1){transition-delay:.1s}
.card-product:hover .card-slider > *:nth-child(2){transition-delay:.2s}
.card-product:hover .card-slider > *:nth-child(3){transition-delay:.3s}
.card-product:hover .card-slider > *:nth-child(4){transition-delay:.4s}

/* ================= TYPOGRAPHY ================= */
.card-body p,
.slider-category {
  font-family: 'Inter', sans-serif;
  color: #000; /* black main text */
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.card-product__title a,
.slider-title {
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  font-weight: 700;
  color: #006400; /* dark green VIP */
  letter-spacing: 0.6px;
  text-decoration: none;
}

.card-product__title a:hover,
.slider-title:hover {
  color: #00ff00; /* bright green hover */
}

/* PRICE */
.card-product__price,
.slider-price {
  font-family: 'Inter', sans-serif;
  font-size: 20px;
  font-weight: 700;
  color: #00ff00; /* green VIP price */
}

/* ================= BUTTON ================= */
.slider-btn,
.card-body .btn {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
  background: linear-gradient(135deg,#006400,#00ff00);
  color: #fff;
  border-radius: 30px;
  padding: 10px 28px;
  border: none;
  text-decoration: none;
  transition: all 0.35s ease;
}

.slider-btn:hover,
.card-body .btn:hover {
  transform: scale(1.15) rotate(-1deg);
  box-shadow: 0 10px 25px rgba(0,255,0,0.45);
}

/* ================= OPTIONAL MICRO ANIMATIONS ================= */
.card-product:hover .card-product__title a {
  animation: textGlow 1.2s infinite alternate;
}
.search-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.search-icon {
    font-size: 18px;
    cursor: pointer;
}

.search-form {
    position: absolute;
    right: 25px;
    opacity: 0;
    transform: scaleX(0);
    transform-origin: right;
    transition: all 0.3s ease;
}

.search-input {
    width: 160px;
    padding: 6px 10px;
    font-size: 13px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
}

/* ACTIVE STATE */
.search-wrapper.active .search-form {
    opacity: 1;
    transform: scaleX(1);
}


.cart-hover {
    position: relative;
}

.mini-cart {
    position: absolute;
    top: 45px;
    right: 0;
    width: 280px;
    background: #fff;
    border: 1px solid #eee;
    padding: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    display: none;
    z-index: 999;
}

.cart-hover:hover .mini-cart {
    display: block;
}

.mini-cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.mini-cart-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 5px;
}

.mini-cart-item h6 {
    font-size: 14px;
    margin: 0;
}

.mini-cart-item small {
    color: #777;
}


@keyframes textGlow {
  from { text-shadow: 0 0 2px #00ff00; }
  to { text-shadow: 0 0 12px #00ff00, 0 0 20px #00ff00; }
}

</style>
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="user/assets/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{route('userindex')}}">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                </ul>
							</li>
              <li class="nav-item submenu dropdown">
  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
    aria-expanded="false">Blog</a>
  <ul class="dropdown-menu">
    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('blog.show', ['slug' => 'sample-blog-slug']) }}">Blog Details</a></li>
  </ul>
</li>

							<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{route('loginpage')}}"a>Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('registerpage')}}">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('history')}}">History</a></li>
                  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Log Out
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>
</li>

                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>

<li class="nav-item search-wrapper">
    <i class="ti-search search-icon"></i>

    <form action="{{ route('search') }}" method="GET" class="search-form">
        <input type="text"
               name="q"
               placeholder="Search products..."
               class="search-input"
               autocomplete="off">
    </form>
</li>

            <ul class="nav-shop">

             @if(Auth::check())
<li class="nav-item cart-hover position-relative">

    <a href="{{ route('cart.index') }}" class="btn position-relative">
        <i class="ti-shopping-cart"></i>

        @if(session()->has('cart') && count(session('cart')) > 0)
            <span class="nav-shop__circle">
                {{ count(session('cart')) }}
            </span>
        @endif
    </a>

    <!-- MINI CART DROPDOWN -->
    <div class="mini-cart">
        @if(session()->has('cart') && count(session('cart')) > 0)
            @php $total = 0; @endphp

            @foreach(session('cart') as $id => $item)
                @php $total += $item['price'] * $item['quantity']; @endphp

                <div class="mini-cart-item">
                    <img src="{{ asset('storage/'.$item['image']) }}" alt="">
                    <div>
                        <h6>{{ $item['name'] }}</h6>
                        <small>{{ $item['quantity'] }} × Rs {{ $item['price'] }}</small>
                    </div>
                </div>
            @endforeach

            <hr>
            <p class="text-end fw-bold">Total: Rs {{ $total }}</p>

            <a href="{{ route('cart.index') }}" class="btn btn-dark btn-sm w-100">
                View Cart
            </a>
        @else
            <p class="text-center text-muted m-0">Cart is empty</p>
        @endif
    </div>
</li>
@endif



              <li class="nav-item"><a class="button button-header" href="#">Buy Now</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->

  <main class="site-main">

    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="user/assets/img/home/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shop is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="#">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide1.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide2.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide3.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Wireless Headphone</h3>
            <p>Accessories Item</p>
          </a>
        </div>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
      <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Trending <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row">
          @forelse($products as $product)
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="{{ asset('storage/Products/'.$product->pic) }}" alt="{{ $product->Name }}" style="height:250px; object-fit:cover;">
                <ul class="card-product__imgOverlay">
                  <li><a href="{{ route('product.details', $product->id) }}"><i class="ti-search"></i></a></li>
                  <li><button><i class="ti-shopping-cart"></i></button></li>
                  <li><button><i class="ti-heart"></i></button></li>
                </ul>
              </div>
              <div class="card-body">
                <p>{{ $product->Categary }}</p>
                <h4 class="card-product__title"><a href="{{ route('product.details', $product->id) }}">{{ $product->Name }}</a></h4>
                <p class="card-product__price">Rs {{ $product->Price }}</p>
                <a href="{{ route('category.products', ['category' => $product->Categary]) }}" class="btn btn-secondary mt-2">Buy Now</a>
              </div>
            </div>
          </div>
          @empty
          <p class="text-center">No products found.</p>
          @endforelse
        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 50% Off</h3>
              <h4>Winter Sale</h4>
              <p>Him she'd let them sixth saw light</p>
             <a href="{{ route('category.products', ['category' => 'Winter Sale']) }}">
    Shop Now
</a>



            </div>
          </div>
        </div>
      </div>
    </section>

  <!--================ Start footer Area  =================-->
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="{{ route('blog.index') }}">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="img/gallery/r1.jpg" alt=""></li>
								<li><img src="img/gallery/r2.jpg" alt=""></li>
								<li><img src="img/gallery/r3.jpg" alt=""></li>
								<li><img src="img/gallery/r5.jpg" alt=""></li>
								<li><img src="img/gallery/r7.jpg" alt=""></li>
								<li><img src="img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>

								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>

								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="user/assets/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="user/assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="user/assets/vendors/skrollr.min.js"></script>
  <script src="user/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="user/assets/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="user/assets/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="user/assets/vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchIcon = document.querySelector('.search-icon');
    const searchWrapper = document.querySelector('.search-wrapper');
    const searchInput = document.querySelector('.search-input');

    searchIcon.addEventListener('click', function () {
        searchWrapper.classList.toggle('active');
        searchInput.focus();
    });

    document.addEventListener('click', function (e) {
        if (!searchWrapper.contains(e.target)) {
            searchWrapper.classList.remove('active');
        }
    });
});
</script>

</body>
</html>
