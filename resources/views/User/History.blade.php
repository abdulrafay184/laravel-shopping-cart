@extends('User.Sidebar')
@section('website')
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-2 mt-4 text-center">
            <h1>User History</h1>
            <style>
    /* body{
        background:#0b0b0b;
    } */

    /* ===== FULL WIDTH WRAPPER ===== */
    .vip-table-wrapper{
        width:100%;
        margin:0;
        padding:20px;
        background:#0b0b0b;
        font-family:'Poppins', sans-serif;
    }

    /* ===== TABLE ===== */
    .vip-table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 14px;
    }

    /* ===== HEADER ===== */
    .vip-table thead th{
        background:linear-gradient(135deg,#ffd400,#ffb700);
        color:#000;
        padding:16px;
        font-weight:600;
        font-size:14px;
        text-transform:uppercase;
        letter-spacing:0.5px;
        border:none;
    }

    /* ===== ROW ===== */
    .vip-table tbody tr{
        background:#151515;
        transition:all 0.35s ease;
        animation:fadeUp 0.6s ease forwards;
    }

    .vip-table tbody tr:hover{
        transform:scale(1.02);
        box-shadow:0 12px 30px rgba(255,212,0,0.25);
        background:#1c1c1c;
    }

    /* ===== CELLS ===== */
    .vip-table tbody td{
        padding:15px 18px;
        font-size:13px;
        color:#f1f1f1;
        border:none;
    }

    .vip-table tbody td:first-child{
        font-weight:600;
        color:#ffd400;
        border-radius:12px 0 0 12px;
    }

    .vip-table tbody td:last-child{
        border-radius:0 12px 12px 0;
        color:#bdbdbd;
        font-size:12px;
    }

    /* ===== ANIMATION ===== */
    @keyframes fadeUp{
        from{
            opacity:0;
            transform:translateY(20px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }

    /* ===== MOBILE VIEW ===== */
    @media(max-width:768px){
        .vip-table thead{
            display:none;
        }
        .vip-table tbody tr{
            display:block;
            margin-bottom:18px;
        }
        .vip-table tbody td{
            display:flex;
            justify-content:space-between;
            padding:12px 14px;
        }
        .vip-table tbody td::before{
            content:attr(data-label);
            color:#ffd400;
            font-weight:600;
        }
    }
</style>


    <table class="vip-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Order Time</th>
            </tr>
            </thead>


            @foreach ($data as $Orders)
            <tr>
                <td data-label="ID">{{ $Orders->id }}</td>
                <td data-label="User Name">{{ $Orders->name }}</td>
                <td data-label="Product Name">{{ $Orders->Name }}</td>
                <td data-label="Quantity">{{ $Orders->quantity }}</td>
                <td data-label="Order Time">{{ $Orders->created_at }}</td>
            </tr>


            @endforeach
            </tbody>
            </table>


            <a href="{{ route('checkouts') }}" class='btn btn-outline-success mt-3 mb-3'>CheckOuts</a>
        </div>
    </div>
</div>
@endsection
