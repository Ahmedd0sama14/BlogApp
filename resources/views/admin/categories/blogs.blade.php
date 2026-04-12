@extends('admin.partials.master')

@section('title', 'Category Blogs')

@section('content')
    <div class="container mt-4">

        <h2>{{ $category->name }} - Blogs</h2>

        <div class="mb-3">
            <span class="badge bg-primary">
                Total Blogs: {{ $blogsCount }}
            </span>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->iteration }}</td>

                        <td>{{ $blog->name }}</td>

                        <td>
                            {{ \Illuminate\Support\Str::limit($blog->content, 80) }}
                        </td>

                        <td>
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" width="70" height="70"
                                    style="object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>

                        <td>
                            {{ $blog->created_at->diffForHumans() }}
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-info">
                                View
                            </a>

                            <a href="#" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No blogs found in this category
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
