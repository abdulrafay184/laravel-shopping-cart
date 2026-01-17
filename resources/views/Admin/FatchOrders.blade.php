@extends('Admin.sidebar')

@section('admin')
<div class="continer">
    <div class="row">
        <div class="col-md-8 offset-2 mt-4">
            <!-- Premium Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
/* ================= VIP CUSTOM TABLE ================= */
.custom-table{
    width:100%;
    border-collapse:separate;
    border-spacing:0 14px;
    font-family:'Poppins', sans-serif;
    background:transparent;
}

/* ===== HEADER ===== */
.custom-table thead th{
    background:linear-gradient(135deg,#ffd400,#ffb700) !important;
    color:#000 !important;
    font-weight:600;
    font-size:13px;
    text-transform:uppercase;
    letter-spacing:.6px;
    padding:16px;
    border:none !important;
}

/* ===== ROW ===== */
.custom-table tbody tr{
    background:#151515;
    transition:all .35s ease;
    animation:vipFade .6s ease both;
}

.custom-table tbody tr:hover{
    transform:translateY(-4px) scale(1.01);
    box-shadow:0 12px 30px rgba(255,212,0,.35);
    background:#1c1c1c;
}

/* ===== CELLS ===== */
.custom-table tbody td{
    padding:14px 18px;
    font-size:13px;
    color:#f1f1f1;
    border:none !important;
    vertical-align:middle;
}

.custom-table tbody td:first-child{
    color:#ffd400;
    font-weight:600;
    border-radius:12px 0 0 12px;
}

.custom-table tbody td:last-child{
    border-radius:0 12px 12px 0;
    color:#bdbdbd;
    font-size:12px;
}

/* ===== REMOVE BOOTSTRAP STRIPES ===== */
.custom-table.table-striped tbody tr:nth-of-type(odd){
    background:#151515;
}

/* ===== ANIMATION ===== */
@keyframes vipFade{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    .custom-table thead{
        display:none;
    }
    .custom-table tbody tr{
        display:block;
        margin-bottom:18px;
        border-radius:12px;
    }
    .custom-table tbody td{
        display:flex;
        justify-content:space-between;
        padding:12px 14px;
    }
    .custom-table tbody td::before{
        content:attr(data-label);
        color:#ffd400;
        font-weight:600;
    }
}
</style>

            <table class="table table-striped table-hover table-bordered text-center custom-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User-ID</th>
                        <th>Product_id</th>
                        <th>Quantity</th>
                        <th>Order Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allorders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->userid }}</td>
                            <td>{{ $order->productid }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
