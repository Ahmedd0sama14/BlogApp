@extends('Themes.master')
@section('title', 'Single Blog')

@section('content')
    @include('Themes.partials.hero', ['title' => $blog->name])

    <section class="blog-post-area section-margin">
        <div class="container">

            <x-alert type="success" />

            <div class="row">

                <!-- Main Content -->
                <div class="col-lg-8 mb-4">

                    <!-- Blog Card -->
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">

                        <div class="card-body">
                            <h2 class="card-title mb-2">{{ $blog->name }}</h2>

                            <p class="text-muted mb-3">
                                By {{ $blog->user->name }} |
                                {{ $blog->created_at->format('M d, Y') }}
                            </p>

                            <p class="card-text" style="line-height:1.8;">
                                {{ $blog->content }}
                            </p>

                            <!-- Like Button -->
                            <form method="POST" action="{{ route('blogs.like', $blog) }}">
                                @csrf
                                <button type="submit"
                                    class="btn btn-sm mt-2 {{ $blog->likes->contains(auth()->id()) ? 'btn-danger' : 'btn-outline-danger' }}">
                                    ❤️ {{ $blog->likes->count() }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-area mb-4">

                        <h4 class="mb-3">
                            {{ $blog->comments_count ?? $blog->comments->count() }}
                            Comment{{ ($blog->comments_count ?? $blog->comments->count()) > 1 ? 's' : '' }}
                        </h4>

                        @foreach ($blog->comments as $comment)
                            <div class="comment-list mb-3 p-3 border rounded">
                                <div class="d-flex justify-content-between">

                                    <div>
                                        <h5>{{ $comment->user->name }}</h5>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                    @if (auth()->id() == $comment->user_id)
                                        <form method="POST" action="{{ route('comments.delete', $comment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    @endif


                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Comment Form -->
                    <div class="comment-form mt-4">
                        <h4>Leave a Reply</h4>

                        <form method="POST" action="{{ route('comments.store', ['blog' => $blog]) }}"
                            class="form-contact comment_form">

                            @csrf

                            <div class="form-group mb-3">
                                <textarea class="form-control text-dark w-100 p-3 " rows="5" name="message" placeholder="Write your comment..."
                                    required>{{ old('message') }}</textarea>

                                <x-input-error :messages="$errors->get('message')" class="mt-1" />
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Post Comment
                            </button>
                        </form>
                    </div>

                </div>

                <!-- Sidebar -->
                @include('Themes.partials.sidebar')

            </div>
        </div>
    </section>
@endsection
