@extends('Admin.sidebar')

@section('admin')
<div class="container mt-5">
    <h2>Edit Blog Post</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Use POST (or PUT if you change route) -->

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" 
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $blog->title) }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" 
                   class="form-control @error('slug') is-invalid @enderror"
                   value="{{ old('slug', $blog->slug) }}" required>
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8"
                      class="form-control @error('content') is-invalid @enderror"
                      required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Blog Image</label><br>
            @if($blog->image)
                <img src="{{ asset('storage/blog/'.$blog->image) }}" alt="Blog Image" width="120" class="mb-2">
            @endif
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Blog</button>
        <a href="{{ route('admin.blogs') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
