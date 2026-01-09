@extends('Admin.sidebar')

@section('admin')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-3"></div>

        <form action="{{ route('insert') }}" method="post"
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
        " enctype="multipart/form-data">
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
            Insert Product
        </h2>

        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" name="Name" placeholder="Product Name"
                class="form-control animated-input">
            </div>

            <div class="col-md-6">
                <input type="number" name="Price" placeholder="Product Price"
                class="form-control animated-input">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <input type="number" name="Quantity" placeholder="Product Quantity"
                class="form-control animated-input">
            </div>

            <div class="col-md-6">
    <select name="Category" class="form-control animated-input" required>
        <option value="" selected disabled hidden>
            📦 Select Product Category
        </option>

        <option value="Electronics">🔌 Electronics</option>
        <option value="Fashion">👕 Fashion</option>
        <option value="Mobiles">📱 Mobiles</option>
        <option value="Laptops">💻 Laptops</option>
        <option value="Home & Kitchen">🏠🍳 Home & Kitchen</option>
        <option value="Beauty & Personal Care">💄 Beauty & Personal Care</option>
        <option value="Health & Wellness">💊 Health & Wellness</option>
        <option value="Grocery">🛒 Grocery</option>
        <option value="Footwear">👟 Footwear</option>
        <option value="Watches">⌚ Watches</option>
        <option value="Bags & Accessories">👜 Bags & Accessories</option>
        <option value="Sports & Fitness">🏋️ Sports & Fitness</option>
        <option value="Toys & Games">🧸 Toys & Games</option>
        <option value="Books & Stationery">📚 Books & Stationery</option>
        <option value="Furniture">🛋️ Furniture</option>
    </select>
        </div>



        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <textarea name="Description" rows="4"
                placeholder="Product Description"
                class="form-control animated-input"
                style="resize:none"></textarea>
            </div>

            <div class="col-md-6">
                <input type="file" name="Image"
                class="form-control animated-file">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <select name="Status" class="form-control animated-input">
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div style="text-align:center; margin-top:30px;">
            <button type="submit" class="animated-btn">
                INSERT PRODUCT
            </button>
        </div>

        </form>

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

        .animated-file{
            background:#f8fbff;
            border:2px dashed #007bff;
            border-radius:12px;
            padding:12px;
            transition: all .35s ease, transform .35s ease;
        }
        .animated-file:hover{
            background:#e6f2ff;
            transform: scale(1.05);
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
            0%{box-shadow:0 0 0 rgba(0,123,
                255,.4)}
            50%{box-shadow:0 0 28px rgba(0,123,255,.7)}
            100%{box-shadow:0 0 0 rgba(0,123,255,.4)}
        }
        </style>

    </div>
</div>
@endsection
