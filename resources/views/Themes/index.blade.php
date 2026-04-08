@extends('Themes.master')

@section('title', 'Home')
@section('home-active', 'active')

@section('content')
<main class="site-main">

    {{-- Hero Section --}}
    @include('Themes.partials.hero', ['title' => 'Home'])

    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">

                {{-- 🔍 Search --}}
                <x-form.search route="blogs.search"  />

                {{-- 📝 Blogs --}}
                <div class="col-lg-8">

                    @forelse ($blogs as $blog)
                        <div class="single-recent-blog-post mb-4">

                            {{-- Image --}}
                            <div class="thumb">
                                <a href="{{ route('blogs.show', $blog) }}">
                                    <img
                                        class="img-fluid"
                                        src="{{ asset('storage/' . $blog->image) }}"
                                        alt="{{ $blog->name }}"
                                    >
                                </a>

                                {{-- Info --}}
                                <ul class="thumb-info">
                                    <li>
                                        <i class="ti-user"></i> {{ $blog->user->name }}
                                    </li>

                                    <li>
                                        <i class="ti-notepad"></i>
                                        {{ $blog->created_at->format('d M Y') }}
                                    </li>

                                    <li>
                                        <i class="ti-themify-favicon"></i>
                                        {{ $blog->comments->count() }} Comments
                                    </li>

                                    {{-- ❤️ Like --}}
                                    <li>
                                        <form method="POST" action="{{ route('blogs.like', $blog) }}">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="btn btn-sm {{ $blog->likes->contains(auth()->id()) ? 'btn-danger' : 'btn-outline-danger' }}"
                                            >
                                                ❤️ {{ $blog->likes->count() }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            {{-- Content --}}
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', $blog) }}">
                                    <h3>{{ $blog->name }}</h3>
                                </a>

                                <p>
                                    {{ ($blog->content) }}
                                </p>

                                <a class="button" href="{{ route('blogs.show', $blog) }}">
                                    Read More <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                    @empty
                        <div class="alert alert-info text-center">
                            No blogs found.
                        </div>
                    @endforelse

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>

                {{-- Sidebar --}}
                @include('Themes.partials.sidebar')

            </div>
        </div>
    </section>

</main>
@endsection
