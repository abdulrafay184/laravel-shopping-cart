@extends('User.Sidebar')

@section('title', $product->Name)

@section('website')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <!-- LEFT: IMAGE -->
        <div class="col-md-6 mb-4">
            <div class="product-detail-image-card shadow-lg">
                <img src="{{ asset('storage/Products/'.$product->pic) }}"
                     alt="{{ $product->Name }}"
                     class="img-fluid product-detail-image">
            </div>
        </div>

        <!-- RIGHT: DETAILS -->
        <div class="col-md-6">
            <div class="product-detail-info">
                <h3 class="product-title mb-2">{{ $product->Name }}</h3>
                <p class="product-category mb-1">Category: {{ $product->Categary }}</p>
                <h4 class="product-price mb-3">${{ $product->Price }}</h4>
                <p class="product-description mb-2">{{ $product->Description }}</p>
                <p class="product-quantity mb-3">Available Quantity: {{ $product->Quantity }}</p>
                <a href="{{ route('orderbook',$product->id) }}" class="btn btn-vip btn-lg">Place Order</a>
            </div>
        </div>
    </div>
</div>

<!-- VIP THEME CSS -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

/* ===== PAGE BACKGROUND ===== */
body{
    background:linear-gradient(135deg,#f0f4f8,#d9e2ec); /* very soft light background */
}

/* ===== IMAGE CARD ===== */
.product-detail-image-card{
    border-radius:28px;
    overflow:hidden;
    background:#fff; /* white background for image container */
    box-shadow:0 15px 40px rgba(0,0,0,0.25); /* subtle shadow behind image */
    transition:0.5s ease;
}

.product-detail-image-card:hover{
    transform:scale(1.03);
    box-shadow:0 25px 60px rgba(0,0,0,0.35); /* slightly stronger on hover */
}

.product-detail-image{
    width:100%;
    height:380px;
    object-fit:cover;
    border-radius:24px;
    transition:0.5s ease;
}

/* ================= INFO BOX ================= */
.product-detail-info{
    background:#fdfdfd; /* soft light background */
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 35px rgba(0,0,0,0.1); /* soft shadow */
}

/* ================= TITLE ================= */
.product-title{
    font-family:'Playfair Display',serif;
    font-size:28px;
    font-weight:700;
    color:#2c3e50; /* dark but soft color */
    margin-bottom:8px;
}

/* ================= CATEGORY ================= */
.product-category{
    font-family:'Poppins',sans-serif;
    font-size:13px;
    color:#7f8c8d; /* soft gray */
    text-transform:uppercase;
    letter-spacing:1px;
}

/* ================= PRICE ================= */
.product-price{
    font-family:'Poppins',sans-serif;
    font-size:26px;
    font-weight:700;
    color:#d35400; /* warm attractive color */
    margin:12px 0;
}

/* ================= DESCRIPTION ================= */
.product-description{
    font-family:'Poppins',sans-serif;
    font-size:15px;
    color:#34495e; /* soft dark text */
    line-height:1.6;
}

/* ================= QUANTITY ================= */
.product-quantity{
    font-family:'Poppins',sans-serif;
    font-size:14px;
    font-weight:600;
    color:#e67e22; /* subtle highlight */
    margin-bottom:20px;
}

/* ================= ORDER BUTTON ================= */
.btn-vip{
    background:linear-gradient(135deg,#f1c40f,#f39c12);
    color:#1c1c1c;
    font-weight:700;
    font-size:16px;
    padding:12px 35px;
    border-radius:25px;
    transition:0.3s ease;
}

.btn-vip:hover{
    transform:scale(1.08);
    box-shadow:0 12px 30px rgba(243,156,18,0.5);
}

/* ================= RESPONSIVE ================= */
@media(max-width:768px){
    .product-detail-info{
        margin-top:20px;
        padding:25px;
    }
    .product-title{
        font-size:24px;
    }
}
</style>

@endsection
