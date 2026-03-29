@extends('Themes.master')
@section('title', 'Single Blog')
@section('content')
    @include('Themes.partials.hero', ['title' => $blog->name])
    <!--================ Hero sm Banner end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8 mb-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top img-fluid" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                        <div class="card-body">
                            <h2 class="card-title mb-2">{{ $blog->name }}</h2>
                            <p class="text-muted mb-3">By {{ $blog->user->name }} |
                                {{ $blog->created_at->format('M d, Y') }}</p>
                            <p class="card-text" style="line-height:1.8;">{{ $blog->content }}</p>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-area mb-4">
                        <h4 class="mb-3">{{ $blog->comments->count() }}
                            Comment{{ $blog->comments->count() > 1 ? 's' : '' }}</h4>
                        @foreach ($blog->comments as $comment)
                            <div class="comment-list mb-3 p-3 border rounded">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5>{{ $comment->user->name }}</h5>
                                        <p>{{ $comment->message }}</p>
                                    </div>

                                    @if (auth()->id() == $blog->user_id)
                                        <form method="POST" action="{{ route('comments.delete', $comment->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Comment Form -->
                    <div class="comment-form mt-4">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" method="POST"
                            action="{{ route('comments.store', ['blog' => $blog]) }}" id="commentForm">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control w-100 p-3 shadow-sm" rows="5" name="message" placeholder="Write your comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                @include('Themes.partials.sidebar')
            </div>
        </div>
    </section>
@endsection
