@extends('Admin.sidebar');

@section('admin')

<div class="container">

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">

            <table class="table mt-4" style="border-collapse: separate; border-spacing:0; transition:all 0.3s;">
    <tr style="background:#a8c0ff; color:#fff; text-transform:uppercase; letter-spacing:1px;">
        <th style="padding:12px;">ID</th>
        <th style="padding:12px;">Name</th>
        <th style="padding:12px;">Mail</th>
        <th style="padding:12px;">Role</th>
        <th style="padding:12px;">Actions</th>
    </tr>

    @foreach ($alluser as $index => $users)
    <tr
        style="background: {{ $index % 2 == 0 ? '#ffffff' : '#e6f0ff' }}; transition: all 0.3s ease;"
        onmouseover="this.style.background='#d0e0ff'; this.style.transform='scale(1.02)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.1)';"
        onmouseout="this.style.background='{{ $index % 2 == 0 ? '#ffffff' : '#e6f0ff' }}'; this.style.transform='scale(1)'; this.style.boxShadow='none';"
    >
        <td style="padding:12px; font-weight:600;">{{ $users->id}}</td>
        <td style="padding:12px;">{{ $users->name}}</td>
        <td style="padding:12px;">{{ $users->mail}}</td>
        <td style="padding:12px;">{{ $users->role}}</td>
        <td style="padding:12px; display:flex; gap:6px;">
            <!-- Edit Link -->
            <a href=""
            style="
                color:#4facfe;
                font-weight:600;
                text-decoration:none;
                padding:4px 10px;
                border-radius:12px;
                transition: all 0.3s ease;
            "
            onmouseover="this.style.background='#667eea'; this.style.color='#fff'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='transparent'; this.style.color='#4facfe'; this.style.transform='scale(1)';"
            >Edit</a> /
            <!-- Delete Link -->
            <a href="{{ route('userdelete',$users->id) }}"
            style="
                color:#ff4d4d;
                font-weight:600;
                text-decoration:none;
                padding:4px 10px;
                border-radius:12px;
                transition: all 0.3s ease;
            "
            onmouseover="this.style.background='#ff6b6b'; this.style.color='#fff'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='transparent'; this.style.color='#ff4d4d'; this.style.transform='scale(1)';"
            >Delete</a>
        </td>
    </tr>
    @endforeach
</table>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection

{{-- {{ route('userdelete',$users->id) }} --}}
