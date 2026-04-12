@extends('admin.partials.master')

@section('title', 'User Profile')

@section('content')
    <div class="container mt-4">

        <h2>User Profile</h2>

        {{-- User Info --}}
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $user->name }}</h4>
                <p>Email: {{ $user->email }}</p>
                <p>Total Posts: {{ $user->blogs()->count() }}</p>
            </div>
        </div>

        {{-- Blogs --}}
        <h4>User Blogs</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $blog->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No blogs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $blogs->links() }}

    </div>
@endsection
