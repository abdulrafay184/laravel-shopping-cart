@extends('Admin.sidebar')

@section('admin')

<div class="container">

    <div class="row">
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="mb-4 mt-4 text-center all-users-heading">
                <h2 class="fw-bold text-primary">
                    <i class="bi bi-people-fill me-2"></i>All Users
                </h2>
                <p class="text-muted">View and manage all registered users</p>
            </div>

            <table class="table table-striped table-hover table-bordered text-center custom-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alluser as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->mail }}</td>
                            <td>{{ $users->role }}</td>
                            <td>
                                <a href="{{ route('useredit', $users->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('userdelete', $users->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection

{{-- Custom CSS --}}
<style>
/* Container & Dashboard Heading */
.container h1 {
    font-size: 2.5rem;
    letter-spacing: 1px;
}

.container p {
    font-size: 1rem;
}

/* Alert Styling */
.alert-success {
    font-weight: 500;
    border-left: 5px solid #198754;
}

/* Table Card */
.table-responsive {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Table Styling */
table.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px; /* space between rows */
}

table.table thead th {
    border: none;
    font-size: 0.95rem;
    letter-spacing: 0.5px;
    padding: 12px;
}

table.table tbody tr {
    border-radius: 8px;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

table.table tbody tr:hover {
    background-color: #e2e6ea;
}

/* Table Cells */
table.table td {
    vertical-align: middle;
    padding: 12px;
}

/* Badges */
.badge {
    font-size: 0.85rem;
    padding: 0.4em 0.65em;
}

/* Buttons */
.btn-sm {
    font-size: 0.8rem;
    padding: 0.35rem 0.7rem;
    transition: transform 0.2s ease;
}

.btn-sm:hover {
    transform: scale(1.05);
}

/* Responsive tweaks */
@media (max-width: 768px) {
    table.table td, table.table th {
        font-size: 0.8rem;
        padding: 8px;
    }
    .container h1 {
        font-size: 2rem;
    }
}
</style>
