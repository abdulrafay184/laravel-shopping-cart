@extends('Admin.sidebar')

@section('admin')
<div class="container mt-5">
    <h3>{{ isset($blog) ? 'Edit Blog Post' : 'Create New Blog Post' }}</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}" method="POST">
        @csrf
        @if(isset($blog))
            @method('PUT')
        @endif

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ $blog->title ?? old('title') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="slug">Slug (unique)</label>
            <input type="text" name="slug" id="slug" class="form-control" 
                   value="{{ $blog->slug ?? old('slug') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="8" required>{{ $blog->content ?? old('content') }}</textarea>
        </div>

        <button class="btn btn-success">{{ isset($blog) ? 'Update Post' : 'Add Post' }}</button>
    </form>
</div>
@endsection
