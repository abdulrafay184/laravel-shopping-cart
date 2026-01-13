@extends('User.Sidebar')

@section('website')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 mt-5">
            <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Now</title>

<style>
/* ===== RESET ===== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}

/* ===== BACKGROUND ===== */
body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#cce7ff,#ffffff);
}

/* ===== FORM CARD ===== */
.order-card{
    width:100%;
    max-width:420px;
    background:rgba(255,255,255,0.75);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:30px;
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
    animation:slideUp 1s ease;
}

@keyframes slideUp{
    from{opacity:0; transform:translateY(40px);}
    to{opacity:1; transform:translateY(0);}
}

/* ===== TITLE ===== */
.order-card h2{
    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
}

/* ===== INPUT GROUP ===== */
.input-group{
    margin-bottom:15px;
    position:relative;
}

.input-group input,
.input-group select,
.input-group textarea{
    width:100%;
    padding:12px 15px;
    border-radius:10px;
    border:1px solid #cce7ff;
    outline:none;
    background:#f9fcff;
    transition:0.3s;
}

.input-group textarea{
    resize:none;
    height:80px;
}

.input-group input:focus,
.input-group select:focus,
.input-group textarea:focus{
    border-color:#0d6efd;
    box-shadow:0 0 8px rgba(13,110,253,0.3);
    transform:scale(1.02);
}

/* ===== BUTTON ===== */
button{
    width:100%;
    padding:13px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#0d6efd,#66b2ff);
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.4s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(13,110,253,0.4);
}

/* ===== RESPONSIVE ===== */
@media(max-width:480px){
    .order-card{
        margin:15px;
        padding:25px;
    }
}
</style>
</head>

<body>

<div class="order-card">
    <h2>Place Your Order</h2>

    <form action="save_order.php" method="POST">

        <div class="input-group">
            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="input-group">
            <input type="tel" name="phone" placeholder="Phone Number" required>
        </div>

        <div class="input-group">
            <select name="product" required>
                <option value="">Select Product</option>
                <option value="Website">Website</option>
                <option value="Mobile App">Mobile App</option>
                <option value="Graphic Design">Graphic Design</option>
            </select>
        </div>

        <div class="input-group">
            <input type="number" name="quantity" placeholder="Quantity" required>
        </div>

        <div class="input-group">
            <textarea name="address" placeholder="Delivery Address" required></textarea>
        </div>

        <button type="submit">Submit Order</button>
    </form>
</div>



        </div>
    </div>
</div>


@endsection
