@extends('User.Sidebar')

@section('title', $blog->title)

@section('website')
<div class="container mt-5">
    <h2 class="mb-3">{{ $blog->title }}</h2>
    <p class="text-muted">Published on: {{ $blog->created_at->format('d M Y') }}</p>

    @if($blog->image)
        <img src="{{ asset('storage/blogs/'.$blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-4">
    @endif

    <div class="content">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-4">Back to Blog</a>
</div>
@endsection
