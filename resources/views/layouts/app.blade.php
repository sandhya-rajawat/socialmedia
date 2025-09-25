<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My App')</title>
    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/components.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
    <link href="assets/css/forms.css" rel="stylesheet">
    <link href="assets/css/media.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    @include('layouts.partials.navbar')
    <div class="row mt-3">
        <!-- Sidebar -->
        <div class="col-md-3 sticky-top shadow-sm" id="sidebar-wrapper">
            @include('layouts.partials.sidebar')
        </div>
        <!-- Content -->
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
    <!-- Right Widget -->
    <div class="mt-4">
        @include('layouts.partials.weather-widget')
    </div>
</body>
</html>