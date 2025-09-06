<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <div class="flex">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Page Content -->
        <!-- Main Content -->


        <div class="flex-1 p-6">
            @yield('content')
        </div>
        <!-- Right Sidebar -->


    </div>
    <div class="w-1/4 p-4">
        @include('layouts.partials.weather-widget')
    </div>



    @vite('resources/js/app.js')
</body>

</html>