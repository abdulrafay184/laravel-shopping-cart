@extends('User.Sidebar')

@section('title', 'Blog')

@section('website')
<div class="container mt-5">
    <h2 class="mb-4">Our Blog</h2>

    @if($blogs->isEmpty())
        <p class="text-muted">No blog posts found.</p>
    @else
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/blog/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->content, 100) }}</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
