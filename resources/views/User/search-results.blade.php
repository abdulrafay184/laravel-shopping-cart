@extends('User.Sidebar')

@section('content')
<div class="container mt-5">
    <h4>Search results for: "{{ $query }}"</h4>

    <div class="row mt-4">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/Products/'.$product->pic) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                        <div class="card-body text-center">
                            <h6>{{ $product->Name }}</h6>
                            <p>Rs {{ $product->Price }}</p>
                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-success">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p style="color:red; font-weight:bold; font-size:18px;">
                    This product is not available.
                </p>
            </div>
        @endif
    </div>
</div>
@endsection
