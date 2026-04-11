<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="/" class="brand-link">
            <img src="{{ asset('assets') }}/Adminassets/img/AdminLTELogo.png"
                 class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Blog Admin</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-file-text"></i>
                        <p>
                            Posts
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/posts" class="nav-link">
                                <i class="bi bi-circle"></i>
                                <p>All Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/posts/create" class="nav-link">
                                <i class="bi bi-circle"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Comments -->
                <li class="nav-item">
                    <a href="/admin/comments" class="nav-link">
                        <i class="nav-icon bi bi-chat-dots"></i>
                        <p>Comments</p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Users</p>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a href="/admin/settings" class="nav-link">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
