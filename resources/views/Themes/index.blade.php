@extends('Themes.master')
@section('title', 'Home')
@section('home-active', 'active')
@section('content')
    <main class="site-main">
        @include('Themes.partials.hero', ['title' => 'Home'])
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($blogs as $blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                        <img class="img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="">
                                    </a>
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                        <li><a href="#"><i
                                                    class="ti-notepad"></i>{{ $blog->created_at->format('d-m-Y') }}</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('blogs.like', $blog) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-sm {{ $blog->likes->contains(auth()->id()) ? 'btn-danger' : 'btn-outline-danger' }}">
                                                    ❤️ {{ $blog->likes->count() }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h3>{{ $blog->name }}</h3>
                                    </a>
                                    <p>{{ $blog->content }}</p>
                                    <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                    <!-- Start Blog Post Siddebar -->
                    @include('Themes.partials.sidebar')
                    <!-- End Blog Post Siddebar -->
                </div>
        </section>
    </main>
@endsection
