@extends('User.Sidebar')
@section('website')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-3"></div>

        <form action="{{ route('checkoutconfirm') }}" method="POST"
        style="
            max-width:720px;
            margin:50px auto;
            padding:35px 30px;
            border-radius:18px;
            background: linear-gradient(145deg, #ffffff, #eaf4ff);
            box-shadow: 0 30px 70px rgba(0,123,255,0.25);
            animation: formFadeScale 1.2s ease forwards;
            position: relative;
            opacity:0;
            transform: translateY(50px) scale(0.95);
        ">
        @csrf

        <!-- Blue Top Line -->
        <div style="
            position:absolute;
            top:0;
            left:0;
            right:0;
            height:4px;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            border-radius:18px 18px 0 0;
            animation: glowLine 2s infinite alternate;
        "></div>

        <h2 style="
            text-align:center;
            color:#007bff;
            margin-bottom:35px;
            font-weight:800;
            letter-spacing:2px;
            text-transform:uppercase;
            animation: floatTitle 3s ease-in-out infinite;
        ">
            Checkout Order
        </h2>

        <!-- Customer Info -->
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="Full Name"
                class="form-control animated-input" required>
            </div>
            <div class="col-md-6">
                <input type="email" name="email" placeholder="Email Address"
                class="form-control animated-input" required>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <input type="tel" name="phone" placeholder="Phone Number"
                class="form-control animated-input" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="city" placeholder="City"
                class="form-control animated-input" required>
            </div>
        </div>

        <!-- Address -->
        <div class="row mb-4">
            <div class="col-md-8">
                <input type="text" name="address" placeholder="Full Address"
                class="form-control animated-input" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="postal_code" placeholder="Postal Code"
                class="form-control animated-input" required>
            </div>
        </div>

        <!-- Order Notes -->
        <div class="row mb-4">
            <div class="col-md-12">
                <textarea name="notes" rows="3"
                placeholder="Order Notes (Optional)"
                class="form-control animated-input"
                style="resize:none"></textarea>
            </div>
        </div>

        <!-- Payment Method -->
        <div class="row mb-4">
            <div class="col-md-12">
                <select name="payment_method" class="form-control animated-input" required>
                    <option value="" disabled selected hidden>
                        💳 Select Payment Method
                    </option>
                    <option value="cod">💵 Cash on Delivery</option>
                    <option value="card">💳 Credit / Debit Card</option>
                    <option value="bank">🏦 Bank Transfer</option>
                    <option value="wallet">📱 JazzCash / EasyPaisa</option>
                </select>
            </div>
        </div>

        <div style="text-align:center; margin-top:30px;">
            <button type="submit" class="animated-btn">
                PLACE ORDER
            </button>
        </div>

        </form>

        <!-- SAME CSS (UNCHANGED) -->
        <style>
        .animated-input{
            background:#fff;
            border:2px solid #cfe2ff;
            border-radius:12px;
            padding:14px;
            transition: all .35s ease, transform .35s ease;
        }
        .animated-input:focus{
            border-color:#007bff;
            box-shadow:0 0 18px rgba(0,123,255,.45);
            transform: translateY(-4px);
        }

        .animated-btn{
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color:#fff;
            padding:14px 55px;
            font-size:16px;
            font-weight:700;
            border:none;
            border-radius:30px;
            letter-spacing:2px;
            cursor:pointer;
            box-shadow:0 12px 30px rgba(0,123,255,.45);
            animation:pulse 2s infinite;
            transition: all .3s ease, transform .3s ease;
        }
        .animated-btn:hover{
            transform: translateY(-4px) scale(1.07);
            box-shadow:0 20px 45px rgba(0,123,255,.65);
        }

        @keyframes formFadeScale{
            to{opacity:1; transform:translateY(0) scale(1);}
        }
        @keyframes glowLine{
            from{opacity:.5}
            to{opacity:1}
        }
        @keyframes floatTitle{
            0%,100%{transform:translateY(0)}
            50%{transform:translateY(-6px)}
        }
        @keyframes pulse{
            0%{box-shadow:0 0 0 rgba(0,123,255,.4)}
            50%{box-shadow:0 0 28px rgba(0,123,255,.7)}
            100%{box-shadow:0 0 0 rgba(0,123,255,.4)}
        }

        /* ===== FORM WIDTH SLIGHTLY INCREASE ===== */
form {
    width: 100%;
}

/* ===== INPUT & SELECT RESPONSIVENESS FIX ===== */
.animated-input {
    width: 100%;
    min-height: 52px;
    padding: 12px 16px;
    font-size: 15px;
    border-radius: 12px;
}

/* ===== PAYMENT SELECT FIX ===== */
select.animated-input {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: #ffffff;
    background-image:
        linear-gradient(45deg, transparent 50%, #007bff 50%),
        linear-gradient(135deg, #007bff 50%, transparent 50%);
    background-position:
        calc(100% - 20px) calc(1em + 6px),
        calc(100% - 15px) calc(1em + 6px);
    background-size:
        5px 5px,
        5px 5px;
    background-repeat: no-repeat;
    cursor: pointer;
}

/* ===== MOBILE PERFECT FIX ===== */
@media (max-width: 576px) {
    form {
        padding: 28px 20px;
    }

    .animated-input {
        font-size: 14px;
        min-height: 50px;
    }
}

        </style>

    </div>
</div>

@endsection
