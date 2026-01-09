@extends('Admin.sidebar')
@section('admin')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-8 offset-1 mt-5">
            <table class="table"
style="
    background:#f8f9fa;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,0.12);
    transform: translateY(20px);
    opacity:0;
    animation:tableFade 1s forwards;
    animation-delay:0.2s;
">
    <tr style="
        background: linear-gradient(90deg,#667eea,#764ba2);
        color:#fff;
        font-size:14px;
        letter-spacing:1px;
        text-transform:uppercase;
    ">
        <th style="padding:16px;">Id</th>
        <th style="padding:16px;">Name</th>
        <th style="padding:16px;">Amount</th>
        <th style="padding:16px;">Quantity</th>
        <th style="padding:16px;">Category</th>
        <th style="padding:16px;">Description</th>
        <th style="padding:16px;">Picture</th>
        <th style="padding:16px;">Status</th>
        <th style="padding:16px;">Actions</th>
    </tr>

    @foreach ($fatch as $data )
    <tr
        onmouseover="this.style.background='#eef2ff'; this.style.transform='scale(1.02)';"
        onmouseout="this.style.background='#f8f9fa'; this.style.transform='scale(1)';"
        style="transition: all 0.3s ease;"
    >
        <td style="padding:14px; font-weight:700;">{{ $data->id }}</td>
        <td style="padding:14px;">{{ $data->Name }}</td>
        <td style="padding:14px; color:#667eea; font-weight:700;">{{ $data->Price }}</td>
        <td style="padding:14px;">{{ $data->Quantity }}</td>
        <td style="padding:14px;">{{ $data->Categary }}</td>
        <td style="padding:14px; max-width:220px;">{{ $data->Description }}</td>
        <td style="padding:14px;">
            <img src="{{ url('storage/Products/'.$data->pic) }}"
            width="100px" height="50px"
            style="border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,.2); transition: all 0.3s;">
        </td>
        <td style="padding:14px; font-weight:700; color:#28a745;">
            {{ $data->Status }}
        </td>
        <td style="padding:14px; display:flex; gap:6px;">
            <!-- Edit Button -->
            <a href=""
            style="
                background:#667eea;
                color:#fff;
                padding:6px 14px;
                border-radius:20px;
                text-decoration:none;
                font-size:13px;
                font-weight:600;
                box-shadow:0 4px 12px rgba(0,0,0,0.15);
                transition: all 0.3s;
            "
            onmouseover="this.style.background='#764ba2'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='#667eea'; this.style.transform='scale(1)';"
            >Edit</a>

            <!-- Delete Button -->
            <a href="{{ route('deleteproduct',$data->id) }}"
            style="
                background:#ff4d4d;
                color:#fff;
                padding:6px 14px;
                border-radius:20px;
                text-decoration:none;
                font-size:13px;
                font-weight:600;
                box-shadow:0 4px 12px rgba(0,0,0,0.15);
                transition: all 0.3s;
            "
            onmouseover="this.style.background='#ff6b6b'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='#ff4d4d'; this.style.transform='scale(1)';"
            >Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- Inline animation keyframes -->
<style>
@keyframes tableFade {
    0% {opacity:0; transform:translateY(20px);}
    100% {opacity:1; transform:translateY(0);}
}
</style>

        </div>
    </div>
</div>

@endsection




