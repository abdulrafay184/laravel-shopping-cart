@extends('User.Sidebar')

@section('website')

<div class="container">
    <div class="row mb-5 mt-5">

@foreach ($products as $products)
<div class="col-md-4">
    <div class="card vip-card">
        <!-- Discount Badge -->
        <div class="discount-badge">30% OFF</div>

        <div class="card-img-wrapper">
            <img src="{{ asset('storage/Products/'.$products->pic) }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $products->Name }}</h5>

            <!-- Star Rating -->
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star half">&#9733;</span>
                <span class="review-count">(12 Reviews)</span>
            </div>

            <p class="card-text">{{ $products->Description }}</p>
            <p class="card-text">{{ $products->Categary }}</p>
            <a href="{{ route('userindex')}}" class="btn vip-btn">Go More Info</a>
        </div>
    </div>
</div>

<style>
/* Discount Badge */
.discount-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #00d4ff;
    color: #000;
    font-weight: bold;
    padding: 5px 10px;
    border-radius: 5px;
    z-index: 2;
    font-size: 14px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}

/* Card VIP Style - Dark + Light Blue */
.vip-card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.4s ease, box-shadow 0.4s ease, backdrop-filter 0.4s ease;
    cursor: pointer;
    position: relative;
    background: rgba(15,15,15,0.85); /* dark semi-transparent */
    color: #fff;
    border: 1px solid rgba(0,212,255,0.3);
    backdrop-filter: blur(5px);
}

.vip-card:hover {
    transform: translateY(-12px) scale(1.04);
    box-shadow: 0 20px 40px rgba(0,0,0,0.6), 0 0 25px rgba(0,212,255,0.5);
}

/* Image zoom on hover */
.card-img-wrapper {
    overflow: hidden;
}

.vip-card:hover .card-img-top {
    transform: scale(1.08);
    transition: transform 0.5s ease;
}

/* Title Color & Glow */
.card-title {
    position: relative;
    z-index: 1;
    font-weight: 700;
    color: #00d4ff;
    transition: all 0.4s ease;
}

.vip-card:hover .card-title {
    text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff;
    transform: translateY(-4px);
}

/* Rating Style */
.rating {
    display: flex;
    align-items: center;
    margin: 5px 0;
}

.star {
    color: #00d4ff;
    font-size: 16px;
    margin-right: 2px;
    position: relative;
}

.star.half::before {
    content: "\2605";
    position: absolute;
    left: 0;
    width: 50%;
    overflow: hidden;
    color: #00d4ff;
}

.review-count {
    color: #ccc;
    font-size: 14px;
    margin-left: 5px;
}

/* Description animation */
.card-text {
    color: #ccc;
    transition: all 0.4s ease;
}

.vip-card:hover .card-text {
    transform: translateY(-2px);
    opacity: 0.9;
}

/* Button Light Blue Effect */
.vip-btn {
    background: #00d4ff;
    color: #000;
    border: none;
    padding: 8px 20px;
    border-radius: 50px;
    transition: all 0.4s ease, box-shadow 0.4s ease;
    position: relative;
    z-index: 1;
    overflow: hidden;
}

.vip-btn:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 0 15px #00d4ff, 0 0 25px #00d4ff, 0 0 40px #00d4ff;
}
</style>



@endforeach

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
