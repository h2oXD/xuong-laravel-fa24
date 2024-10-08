<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    @include('Admins.layouts.partials.style')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- Sidenav Menu Start -->
        @include('Admins.layouts.partials.menu')
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        @include('Admins.layouts.partials.header')
        <!-- Topbar End -->

        <!-- Search Modal -->
        @include('Admins.layouts.partials.search')

        <!-- Start Page Content here -->
        @yield('content')
        <!-- End Page content -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('Admins.layouts.partials.theme-setting')

    @include('Admins.layouts.partials.script')

</body>
</html>
