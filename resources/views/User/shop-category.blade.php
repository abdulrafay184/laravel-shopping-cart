<!-- @extends('User.Sidebar')

@section('website')

<h2>Category: {{ $category->name }}</h2>

<div class="row">

    <div class="col-md-3">
        <h4>Categories</h4>
        <ul>
            @foreach($categories as $cat)
                <li><a href="{{ route('shop.category', $cat->id) }}">{{ $cat->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-9">
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('uploads/products/'.$product->pic) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Rs {{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products in this category</p>
            @endforelse
        </div>

        {{ $products->links() }}
    </div>

</div>

@endsection -->
