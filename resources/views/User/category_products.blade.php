@extends('User.sidebar')

@section('title', $category.' Products')

@section('website')
<div class="container mt-5">
    <h2 class="mb-4">{{ $category }} Products</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 product-card">
                <!-- Product Image -->
                <div class="product-image-wrapper">
                    @if($product->pic)
                    <img src="{{ asset('storage/Products/'.$product->pic) }}" class="card-img-top product-image" alt="{{ $product->Name }}">
                    @else
                    <img src="{{ asset('user/assets/img/placeholder.png') }}" class="card-img-top product-image" alt="No Image">
                    @endif
                    <span class="price-badge">${{ $product->Price }}</span>
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->Name }}</h5>
                    <p class="text-muted mb-2">{{ \Illuminate\Support\Str::limit($product->Description, 80, '...') }}</p>

                    <!-- View Details Button -->
                    <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary mt-auto">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($products->isEmpty())
        <p class="text-center text-muted">No products found in this category.</p>
    @endif
</div>

<!-- Custom CSS -->
<style>
.product-card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
}

.product-image {
    height: 250px;
    object-fit: cover;
    transition: transform 0.3s ease;
    width: 100%;
}

.product-image-wrapper:hover .product-image {
    transform: scale(1.1);
}

.price-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #28a745;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    border-radius: 5px;
    font-size: 0.9rem;
}
</style>
@endsection
