<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>
    <link href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/forms.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    @yield('content')
</body>
</html>
