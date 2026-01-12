@extends('layouts.app')

@section('title', $product->Name)

@section('content')
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
                <a href="{{ route('place.order', $product->id) }}" class="btn btn-vip btn-lg">Place Order</a>
            </div>
        </div>
    </div>
</div>

<!-- VIP THEME CSS -->
<style>
/* ===== IMAGE CARD ===== */
.product-detail-image-card {
    border-radius: 25px;
    overflow: hidden;
    border: 3px solid #d4af37; /* gold border */
    box-shadow: 0 15px 45px rgba(212,175,55,0.35);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
}

.product-detail-image-card:hover {
    transform: scale(1.05);
    box-shadow: 0 25px 60px rgba(212,175,55,0.45);
}

.product-detail-image {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 22px;
    transition: transform 0.5s ease, box-shadow 0.4s ease;
}

.product-detail-image:hover {
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0 20px 50px rgba(212,175,55,0.35);
}

/* ===== DETAILS ===== */
.product-detail-info {
    padding-left: 10px;
}

/* Title */
.product-title {
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 28px;
    color: #f5f5f5;
    letter-spacing: 0.5px;
    background: linear-gradient(135deg, #d4af37, #f9e076);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Category */
.product-category {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #bfbfbf;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* Price */
.product-price {
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    font-size: 24px;
    background: linear-gradient(135deg,#d4af37,#f9e076);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Description & Quantity */
.product-description, .product-quantity {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #ccc;
}

/* BUTTON */
.btn-vip {
    background: linear-gradient(135deg,#d4af37,#f9e076);
    color: #111;
    font-weight: 600;
    border-radius: 25px;
    border: none;
    padding: 10px 25px;
    transition: all 0.3s ease;
}

.btn-vip:hover {
    transform: scale(1.08);
    box-shadow: 0 10px 25px rgba(212,175,55,0.45);
}
</style>
@endsection
