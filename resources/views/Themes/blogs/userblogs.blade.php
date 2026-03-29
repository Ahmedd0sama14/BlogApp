@extends('Themes.master')
@section('title', 'My Blogs')

@section('content')
    @include('Themes.partials.hero', ['title' => 'My Blogs'])

    <section class="blog-post-area section-margin mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mx-auto">

                    @if ($userBlogs->isEmpty())
                        <div class="text-center p-5">
                            <h3>No blogs yet 😢</h3>
                            <a href="{{ route('blogs.create') }}" class="btn btn-primary mt-3">
                                Create your first blog
                            </a>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($userBlogs as $blog)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0">

                                        <!-- Image -->
                                        <div style="height:200px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top"
                                                style="height:100%; width:100%; object-fit:cover;"
                                                alt="{{ $blog->name }}">
                                        </div>

                                        <!-- Content -->
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                {{ $blog->name }}
                                            </h5>

                                            <p class="card-text text-muted">
                                                {{ $blog->content }}
                                            </p>

                                            <div class="mt-auto">
                                                <small class="text-muted">
                                                    {{ $blog->created_at->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="card-footer bg-white border-0 d-flex justify-content-between">

                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                View
                                            </a>

                                            <div>
                                                <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    Edit
                                                </a>

                                                <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $userBlogs->links('pagination::bootstrap-4') }}
                        </div>

                    @endif

                </div>

            </div>
        </div>
    </section>
@endsection
