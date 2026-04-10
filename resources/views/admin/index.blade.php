@extends('admin.partials.master')
@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- 🔥 Stats Cards -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $blogs }}</h3>
                    <p>Posts</p>
                </div>
                <i class="bi bi-file-text fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $comments->count() }}</h3>
                    <p>Comments</p>
                </div>
                <i class="bi bi-chat-dots fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Users</p>
                </div>
                <i class="bi bi-people fs-1 p-3"></i>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>
                        {{ $categories }}
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
                            <tr>
                                <td>First Post</td>
                                <td>Admin</td>
                                <td>2026-04-10</td>
                            </tr>
                            <tr>
                                <td>Laravel Tips</td>
                                <td>Ahmed</td>
                                <td>2026-04-09</td>
                            </tr>
                            <tr>
                                <td>How to build blog</td>
                                <td>Mohamed</td>
                                <td>2026-04-08</td>
                            </tr>
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
                    <div class="mb-3 border-bottom pb-2">
                        <strong>Ali</strong>
                        <p class="mb-1">Great article!</p>
                        <small class="text-muted">on First Post</small>
                    </div>

                    <div class="mb-3 border-bottom pb-2">
                        <strong>Sara</strong>
                        <p class="mb-1">Thanks for sharing 🙌</p>
                        <small class="text-muted">on Laravel Tips</small>
                    </div>

                    <div class="mb-3">
                        <strong>Omar</strong>
                        <p class="mb-1">Very helpful 👍</p>
                        <small class="text-muted">on Blog Guide</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
