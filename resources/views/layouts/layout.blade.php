<!DOCTYPE html>
<html lang="en" class="h-[100vh]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo_fix.png') }}" type="image/x-icon">

    <title>Pintarin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- SimpleBar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('assets')
</head>

<body class="box-border">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
        integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <main class="flex flex-col h-screen">
        @if (!in_array(Route::currentRouteName(), ['login', 'welcome']))
            @include('layouts.components.navbar.navbar')
        @endif
        <div class="flex h-full">
            @if (in_array(Route::currentRouteName(), ['students.detail']))
                @include('layouts.components.sidebar.sidebar')
            @endif
            @yield('content')
        </div>
        @include('layouts.components.toast')
    </main>
    <!-- SimpleBar JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    @yield('scripts')
    <script>
        feather.replace();
    </script>
</body>

</html>
