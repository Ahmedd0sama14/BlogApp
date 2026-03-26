@extends('Themes.master')
@section('title', 'Categories')
@section('Categories-active', 'active')
@section('content')

    <!--================ Hero sm Banner start =================-->
    @include('Themes.partials.hero', ['title' => $CatogaryName])
    <!--================ Hero sm Banner end =================-->


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($categoryBlogs->isEmpty())
                        <h2 class="text-center">No blogs found in this category.</h2>
                     @else
                        @foreach ($categoryBlogs as $blog)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset('storage/'.$blog->image)}}"
                                                alt="">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="blog-single.html">
                                                <h3>{{ $blog->name }}</h3>
                                            </a>
                                            <p>{{ $blog->content }}</p>
                                            <a class="button" href="{{ route('blogs.show',['blog' => $blog]) }}">Read More <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                     @endif




                        <div class="row">
                            <div class="col-lg-12">
                              {{ $categoryBlogs->links( 'pagination::bootstrap-5') }}
                            </div>
                        </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('Themes.partials.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
@endsection
