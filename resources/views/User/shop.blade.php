<!-- @extends('User.Sidebar')

@section('website')

<h2>Shop</h2>

<div class="row">
@foreach($products as $product)
    <div class="col-md-3">
        <h5>{{ $product->name }}</h5>
        <p>Rs {{ $product->price }}</p>
    </div>
@endforeach
</div>

{{ $products->links() }}

@endsection -->
