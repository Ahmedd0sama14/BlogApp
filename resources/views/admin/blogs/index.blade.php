@extends('admin.partials.master')

@section('title', 'All Blogs')

@section('content')
<div class="container mt-4">

    <x-alert type="success" />

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">All Blogs</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Stats</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($blogs as $blog)
                        <tr>

                            {{-- # --}}
                            <td>
                                {{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}
                            </td>

                            {{-- Name --}}
                            <td class="fw-bold">
                                {{ $blog->name }}
                            </td>

                            {{-- Content (clean + tooltip) --}}
                            <td style="max-width: 250px;">
                                <span title="{{ $blog->content }}">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 40) }}
                                </span>
                            </td>

                            {{-- Image --}}
                            <td>
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                         width="60" height="60"
                                         class="rounded"
                                         style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="text-muted">
                                {{ $blog->created_at->diffForHumans() }}
                            </td>

                            {{-- Stats --}}
                            <td>
                                <span class="badge bg-primary">
                                    {{ $blog->comments_count ?? 0 }} Comments
                                </span>
                                <span class="badge bg-success">
                                    {{ $blog->likes_count ?? 0 }} Likes
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="text-center">
                                <a href="{{ route('admin.blogs.show', $blog) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Show
                                </a>

                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No blogs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
