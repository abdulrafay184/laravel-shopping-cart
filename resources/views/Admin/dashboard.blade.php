@extends('Admin.sidebar')

@section('admin')

<div class="container mt-4">

    {{-- Dashboard Heading --}}
    <div class="mb-4 text-center">
        <h1 class="display-4 fw-bold text-primary">Admin Dashboard</h1>
        <p class="text-muted">Manage all users, roles and system data from here</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Users Table --}}
    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alluser as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->mail }}</td>
                    <td>
                        @if($user->role == 'admin')
                            <span class="badge bg-success">{{ ucfirst($user->role) }}</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($user->role) }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('useredit', $user->id) }}" class="btn btn-sm btn-primary me-1">
                            Edit
                        </a>
                        <a href="{{ route('userdelete', $user->id) }}" 
                           onclick="return confirm('Are you sure you want to delete this user?')" 
                           class="btn btn-sm btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
