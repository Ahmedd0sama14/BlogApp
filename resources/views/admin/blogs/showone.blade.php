@extends('admin.partials.master')

@section('title', $blog->name ?? 'عرض المدونة')

@section('content')
    <div class="container mt-4">

        <x-alert type="success" />

        {{-- Back Button --}}
        <div class="mb-3">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to All Blogs
            </a>
        </div>

        {{-- Blog Header Card --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <h2 class="mb-3">{{ $blog->name }}</h2>

                <p class="text-muted mb-4">

                    <strong>
                        <a href="{{ route('admin.users.show', $blog->user) }}">
                            {{ $blog->user?->name }}
                        </a>
                    </strong>
                    |
                    {{ $blog->created_at->format('d M, Y - h:i A') }}
                </p>
                @if ($blog->image)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="rounded shadow-sm"
                            style="max-height: 320px; object-fit: cover;"
                        >
                    </div>
                @endif

                <div class="blog-content">
                    <p class="lead">{{ $blog->description }}</p>
                </div>
            </div>
        </div>

        {{-- Stats Cards (Likes & Comments) --}}
        <div class="row mb-4 -me-2">
            <div class="col-md-6">
                <div class="card text-center border-primary">
                    <div class="card-body">
                        <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                        <h4>Likes</h4>
                        <h2 class="text-primary">{{ $blog->likes_count }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center border-info">
                    <div class="card-body">
                        <i class="fas fa-comment fa-2x text-info mb-2"></i>
                        <h4>Comments</h4>
                        <h2 class="text-info">{{ $blog->comments_count }}</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">
                    <i class="fas fa-comments"></i>
                    Comments ({{ $blog->comments_count }})
                </h5>
            </div>

            <div class="card-body">

                @forelse ($comments as $comment)
                    <div class="border-bottom pb-3 mb-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong>
                                    <a href="{{ route('admin.users.show', $comment->user) }}">
                                        {{ $comment->user?->name }}
                                    </a>
                                </strong>
                            </div>
                            <small class="text-muted">
                                {{ $comment->created_at->diffForHumans() }}
                            </small>
                        </div>

                        <p class="mt-2 mb-3">{{ $comment->message }}</p>

                        <div>
                            {{--  Delete Button --}}
                            <form action="{{ route('admin.comments.delete', ['comment'=> $comment]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this comment?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center py-4">No comments yet.</p>
                @endforelse

            </div>
        </div>
        <div class="mt-3">
    {{ $comments->links('pagination::bootstrap-5') }}
</div>

    </div>
@endsection
