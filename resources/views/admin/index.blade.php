@extends('admin.partials.master')
@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- 🔥 Stats Cards -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $count['blogs'] }}</h3>
                    <p>Posts</p>
                </div>
                <i class="bi bi-file-text fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $count['comments'] }}</h3>
                    <p>Comments</p>
                </div>
                <i class="bi bi-chat-dots fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $count['users'] }}</h3>
                    <p>Users</p>
                </div>
                <i class="bi bi-people fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>
                        {{ $count['categories'] }}
                    </h3>
                    <p>Categories</p>
                </div>
                <i class="bi bi-tags fs-1 p-3"></i>
            </div>
        </div>
    </div>

    <!-- ⚡ Quick Actions -->
    <div class="mb-4">
        <a href="#" class="btn btn-success">+ Add New Post</a>
        <a href="#" class="btn btn-primary">Manage Categories</a>
        <a href="#" class="btn btn-dark">View Website</a>
    </div>

    <div class="row">

        <!-- 📝 Latest Posts -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Posts</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestBlogs as $blog)
                            <tr>
                                <td>{{ $blog->name }}</td>
                                <td>{{ $blog->user->name }}</td>
                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No latest blogs found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- 💬 Recent Comments -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Comments</h3>
                </div>
                <div class="card-body">
                    @foreach($latestComments  as $comment)
                    <div class="mb-3 border-bottom pb-2">
                        <strong>
                            {{ $comment->user->name }}
                        </strong>
                        <p class="mb-1">{{ $comment->message }}</p>
                        <small class="text-muted">{{ $comment->blog->name }}</small>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>

</div>

@endsection
