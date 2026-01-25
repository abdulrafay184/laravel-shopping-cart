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
/* === CARD BASE === */
.card-product{
    background:linear-gradient(180deg,#ffffff,#f6f9ff);
    border-radius:22px;
    border:none;
    overflow:hidden;
    position:relative;
    transition:all .45s cubic-bezier(.19,1,.22,1);
    box-shadow:0 12px 35px rgba(0,0,0,.1);
}

/* FLOAT EFFECT */
.card-product:hover{
    transform:translateY(-14px) scale(1.04);
    box-shadow:0 35px 80px rgba(0,0,0,.22);
}

/* === IMAGE === */
.card-product__img{
    position:relative;
    overflow:hidden;
}

.card-product__img img{
    transition:transform .6s ease;
}

.card-product:hover .card-product__img img{
    transform:scale(1.15);
}

/* IMAGE OVERLAY ICONS */
.card-product__imgOverlay{
    position:absolute;
    inset:0;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:12px;
    background:linear-gradient(
        180deg,
        rgba(13,110,253,.25),
        rgba(0,0,0,.45)
    );
    opacity:0;
    transition:.4s;
}

.card-product:hover .card-product__imgOverlay{
    opacity:1;
}

.card-product__imgOverlay li a,
.card-product__imgOverlay li button{
    background:#fff;
    width:42px;
    height:42px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#0d6efd;
    border:none;
    transition:.35s;
}

.card-product__imgOverlay li a:hover,
.card-product__imgOverlay li button:hover{
    transform:scale(1.2) rotate(8deg);
    background:#0d6efd;
    color:#fff;
}

/* === TEXT AREA === */
.card-body{
    padding:20px;
}

.card-body p{
    font-size:12px;
    letter-spacing:1px;
    text-transform:uppercase;
    color:#6c757d;
}

.card-product__title a{
    font-size:16px;
    font-weight:700;
    color:#002855;
    text-decoration:none;
}

.card-product__title a:hover{
    color:#0d6efd;
}

.card-product__price{
    font-size:18px;
    font-weight:700;
    color:#0d6efd;
    margin:8px 0 14px;
}

/* === BUY NOW BUTTON === */
.card-body a[href*="product.details"]{
    display:inline-block;
    padding:11px 32px;
    border-radius:999px;
    background:linear-gradient(135deg,#0d6efd,#4facfe);
    color:#fff;
    font-size:14px;
    font-weight:600;
    text-decoration:none;
    box-shadow:0 12px 30px rgba(13,110,253,.45);
    position:relative;
    overflow:hidden;
    transition:.4s;
}

/* SHINE */
.card-body a[href*="product.details"]::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,.45),
        transparent
    );
    transform:translateX(-120%);
    transition:.6s;
}

.card-body a[href*="product.details"]:hover::after{
    transform:translateX(120%);
}

/* HOVER */
.card-body a[href*="product.details"]:hover{
    transform:translateY(-3px) scale(1.08);
    box-shadow:0 20px 50px rgba(13,110,253,.65);
}



.newsletter{
    background:linear-gradient(135deg,#eaf4ff,#ffffff);
    padding:80px 20px;
    text-align:center;
    border-radius:30px;
    margin:80px auto;
}

.newsletter h2{
    font-weight:700;
    color:#003366;
}

.newsletter p{
    color:#555;
    margin-bottom:25px;
}

.newsletter form{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:10px;
}

.newsletter input{
    padding:12px 20px;
    width:280px;
    border-radius:30px;
    border:1px solid #ccc;
    transition:.3s;
}

.newsletter input:focus{
    outline:none;
    border-color:#0d6efd;
    box-shadow:0 0 0 4px rgba(13,110,253,.15);
}

.newsletter button{
    padding:12px 30px;
    border-radius:30px;
    border:none;
    background:linear-gradient(135deg,#0d6efd,#4facfe);
    color:#fff;
    font-weight:600;
    transition:.4s;
}

.newsletter button:hover{
    transform:translateY(-2px) scale(1.05);
    box-shadow:0 12px 30px rgba(13,110,253,.45);
}

.search-wrapper{
    position:relative;
    display:flex;
    align-items:center;
    margin-right:12px;
}

.search-icon{
    position:absolute;
    left:14px;
    color:#0d6efd;
    font-size:14px;
}

.search-input{
    width:200px;              /* FIXED WIDTH */
    max-width:100%;
    padding:8px 14px 8px 36px;
    border-radius:25px;
    border:1px solid rgba(0,0,0,.15);
    background:#fff;
    transition:border-color .3s, box-shadow .3s;
}

.search-input:focus{
    outline:none;
    border-color:#0d6efd;
    box-shadow:0 0 0 3px rgba(13,110,253,.15);
}

/* MOBILE SAFE */
@media (max-width: 991px){
    .search-input{
        width:100%;
    }
}

</style>
</head>
<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="{{ route('userindex') }}"><img src="user/assets/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{ route('userindex') }}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Shop</a></li>
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
                  @if(Auth::check())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('history') }}">History</a></li>
                  @else
                  <li class="nav-item"><a class="nav-link" href="{{ route('loginpage') }}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('registerpage') }}">Register</a></li>
                  @endif
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <li class="nav-item search-wrapper">
                <i class="ti-search search-icon"></i>
                <form action="{{ route('search') }}" method="GET" class="search-form">
                    <input type="text" name="q" placeholder="Search products..." class="search-input" autocomplete="off">
                </form>
            </li>

            <ul class="nav-shop">
                @if(Auth::check())
                <li class="nav-item cart-hover position-relative">
                    <a href="{{ route('cart.index') }}" class="btn position-relative">
                        <i class="ti-shopping-cart"></i>
                        @if(session()->has('cart') && count(session('cart')) > 0)
                            <span class="nav-shop__circle">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
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
                            <a href="{{ route('cart.index') }}" class="btn btn-dark btn-sm w-100">View Cart</a>
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
          <a class="button button-hero" href="{{ route('shop') }}">Browse Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================ Hero banner end =================-->

<!--================ Trending Product Section =================-->
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
              <li><a href="{{ route('add.to.cart', $product->id) }}"><i class="ti-shopping-cart"></i></a></li>
              <li><button><i class="ti-heart"></i></button></li>
            </ul>
          </div>
          <div class="card-body">
            <p>{{ $product->Categary }}</p>
            <h4 class="card-product__title"><a href="{{ route('product.details', $product->id) }}">{{ $product->Name }}</a></h4>
            <p class="card-product__price">Rs {{ $product->Price }}</p>
            <a href="{{ route('category.products',$product->Categary) }}"
   style="
       display:inline-block;
       padding:12px 32px;
       border-radius:999px;
       background: linear-gradient(135deg,#0d6efd,#4facfe);
       color:#fff;
       font-size:14px;
       font-weight:600;
       text-decoration:none;
       box-shadow:0 12px 30px rgba(13,110,253,0.45);
       position:relative;
       overflow:hidden;
       transition: all 0.4s ease;
   "
   onmouseover="
       this.style.background='linear-gradient(135deg,#ff416c,#ff4b2b)';
       this.style.transform='translateY(-3px) scale(1.08)';
       this.style.boxShadow='0 20px 50px rgba(255,65,108,0.65)';
   "
   onmouseout="
       this.style.background='linear-gradient(135deg,#0d6efd,#4facfe)';
       this.style.transform='translateY(0) scale(1)';
       this.style.boxShadow='0 12px 30px rgba(13,110,253,0.45)';
   "
>
   Buy Now
</a>


          </div>
        </div>
      </div>
      @empty
      <p class="text-center">No products found.</p>
      @endforelse
    </div>
  </div>
</section>
<!--================ Trending Product Section End =================-->

<!-- NEWSLETTER -->
<section class="newsletter">
  <div class="container">
    <h2>Subscribe for Offers</h2>
    <p>Get exclusive discounts & latest updates</p>
    <form class="mt-4">
      <input type="email" placeholder="Your Email">
      <button>Subscribe</button>
    </form>
  </div>
</section>
<!--================ Footer =================-->

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



  <script src="{{ asset('user/assets/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/skrollr.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendors/mail-script.js') }}"></script>
  <script src="{{ asset('user/assets/js/main.js') }}"></script>





</body>
</html>
