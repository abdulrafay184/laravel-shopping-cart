@extends('User.Sidebar')

@section('content')
<div class="container py-5">
    <!-- Category Tabs + Search -->
    <div class="row mb-4">
        <div class="col-12 text-center mb-3">
            <a href="{{ route('shop') }}" class="btn btn-outline-dark me-2">All</a>
            <a href="{{ route('shop', ['category'=>'men']) }}" class="btn btn-outline-dark me-2">Men</a>
            <a href="{{ route('shop', ['category'=>'women']) }}" class="btn btn-outline-dark me-2">Women</a>
            <a href="{{ route('shop', ['category'=>'kids']) }}" class="btn btn-outline-dark">Kids</a>
        </div>
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('shop') }}" method="GET" class="d-flex">
                <input type="text" id="search" name="q" class="form-control me-2" placeholder="Search products..." value="{{ request('q') }}">
                <button class="btn btn-dark">Search</button>
            </form>
        </div>
    </div>

    <!-- Products Grid -->
    <div id="productArea" class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted small flex-grow-1">{{ Str::limit($product->description, 50) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="fw-bold">Rs {{ $product->price }}</span>
                            <div class="d-flex">
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-sm btn-outline-dark me-1">View</a>
                                <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-dark">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h4 class="text-danger">Product not available</h4>
                <p class="text-muted">Try searching something else</p>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>

<!-- AJAX Search Script -->
<script>
    document.getElementById('search').addEventListener('keyup', function(){
        let query = this.value;
        fetch(`{{ route('shop') }}?q=${query}`)
            .then(res => res.text())
            .then(data => {
                let parser = new DOMParser();
                let htmlDoc = parser.parseFromString(data, 'text/html');
                document.getElementById('productArea').innerHTML = htmlDoc.getElementById('productArea').innerHTML;
            });
    });
</script>
@endsection