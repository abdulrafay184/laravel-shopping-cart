@extends('Admin.sidebar')

@section('title', 'All Blog Posts')

@section('admin')

<style>
.container {
    max-width: 1200px;
}

h2 {
    font-weight: 600;
    letter-spacing: 0.3px;
}

.alert-success {
    border-left: 5px solid #198754;
    background: #f0fff4;
    color: #155724;
}

.table {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
}

.table thead th {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tbody tr {
    transition: background 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

.table img {
    border-radius: 6px;
    object-fit: cover;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 13px;
    border-radius: 5px;
}

.btn-primary {
    background-color: #4f46e5;
    border-color: #4f46e5;
}

.btn-primary:hover {
    background-color: #4338ca;
    border-color: #4338ca;
}

.btn-danger {
    background-color: #dc2626;
    border-color: #dc2626;
}

.btn-danger:hover {
    background-color: #b91c1c;
    border-color: #b91c1c;
}

.btn-success {
    background-color: #16a34a;
    border-color: #16a34a;
}

.btn-success:hover {
    background-color: #15803d;
    border-color: #15803d;
}

.pagination {
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-link {
    color: #4f46e5;
}

.pagination .active .page-link {
    background-color: #4f46e5;
    border-color: #4f46e5;
}

@media (max-width: 768px) {
    table thead {
        display: none;
    }

    table tr {
        display: block;
        margin-bottom: 15px;
    }

    table td {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border: none;
        border-bottom: 1px solid #eee;
    }

    table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #555;
    }
}
</style>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Blog Posts</h2>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
            Create New Blog
        </a>
    </div>

    @if($blogs->isEmpty())
        <p class="text-center">No blog posts found.</p>
    @else
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($blogs as $blog)
            <tr>
                <td data-label="#"> {{ $loop->iteration }} </td>
                <td data-label="Image">
                    @if($blog->image)
                        <img src="{{ asset('storage/blog/'.$blog->image) }}" width="80">
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                </td>
                <td data-label="Title">{{ $blog->title }}</td>
                <td data-label="Slug">{{ $blog->slug }}</td>
                <td data-label="Date">{{ $blog->created_at->format('d M Y') }}</td>
                <td data-label="Actions">
                    <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('admin.blog.delete', $blog->id) }}"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Are you sure?')">
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}
    @endif
</div>
@endsection
