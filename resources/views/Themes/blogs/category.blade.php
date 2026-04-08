@extends('Themes.master')
@section('title', 'Categories')
@section('Categories-active', 'active')
@section('content')

    <!--================ Hero sm Banner start =================-->
    @include('Themes.partials.hero', ['title' => $category->name])
    <!--================ Hero sm Banner end =================-->


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <!-- 🔍 Search -->
                <x-form.search
                    :route="route('category.search', $category->id)"
                    :category_id="$category->id"
                    placeholder="Search for a blog in {{ $category->name }}..."  />
                <div class="col-lg-8">
                    @forelse ($categoryBlogs as $blog)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-recent-blog-post card-view">
                                    <div class="thumb">
                                        <img class="card-img rounded-0" src="{{ asset('storage/' . $blog->image) }}"
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
                                        <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No blogs found in this category.</p>
                    @endforelse




                    <div class="row">
                        <div class="col-lg-12">
                            {{ $categoryBlogs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('Themes.partials.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
@endsection
