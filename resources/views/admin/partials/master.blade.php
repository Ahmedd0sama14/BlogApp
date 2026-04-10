<!doctype html>
<html lang="en">

@include('admin.partials.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <!-- Header -->
    @include('admin.partials.header')

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('admin.partials.footer')

</div>

@include('admin.partials.scripts')

</body>
</html>
