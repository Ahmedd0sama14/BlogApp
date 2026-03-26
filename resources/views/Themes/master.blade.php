<!DOCTYPE html>
<html lang="en">
@include('Themes.partials.head')

<body>
    @include('Themes.partials.header')
    <!--================Header Menu Area =================-->

    <!--================Header Menu Area =================-->


            @yield('content')


    <!--================ Start Footer Area =================-->
    @include('Themes.partials.footer')
    <!--================ End Footer Area =================-->

    @include('Themes.partials.scripts')

</body>

</html>
