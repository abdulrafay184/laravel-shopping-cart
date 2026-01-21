@extends('User.Sidebar') 

@section('website')

<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">

                    <div class="feature-img">
                        <img class="img-fluid"
                             src="{{ asset('uploads/blogs/'.$blog->image) }}"
                             alt="">
                    </div>

                    <div class="blog_details">
                        <h2>{{ $blog->title }}</h2>

                        <p class="excert">
                            {!! nl2br(e($blog->description)) !!}
                        </p>
                    </div>

                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget">
                        <h4 class="widget_title">Latest Blogs</h4>

                        @foreach(\App\Models\Blog::latest()->take(5)->get() as $item)
                            <div class="media post_item">
                                <img src="{{ asset('uploads/blogs/'.$item->image) }}"
                                     width="80">
                                <div class="media-body">
                                    <a href="{{ route('blog.show', $item->slug) }}">
                                        <h3>{{ $item->title }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
