@extends('layouts.app')

@section('title', $product->Name)

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="product-detail-image">
                    <img src="{{ asset('storage/Products/'.$product->pic) }}" alt="{{ $product->Name }}" class="img-fluid">
                </div>
                <div class="card-body text-center">
                    <h3 class="mb-2">{{ $product->Name }}</h3>
                    <p class="text-muted mb-1">Category: {{ $product->Categary }}</p>
                    <h4 class="text-success mb-3">${{ $product->Price }}</h4>
                    <p>{{ $product->Description }}</p>
                    <p class="mb-2">Available Quantity: {{ $product->Quantity }}</p>
                    <a href="{{ route('place.order', $product->id) }}" class="btn btn-success btn-lg mt-3">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.product-detail-image img {
    max-height: 350px;
    object-fit: cover;
    width: 100%;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

.product-detail-image img:hover {
    transform: scale(1.05);
}
</style>
@endsection
