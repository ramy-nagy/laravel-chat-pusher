<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :class="{ 'theme-dark': dark }" x-data="data()">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="ramy-nagy">
    <meta name="description" content="dashboard">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- Styles -->
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}">
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            {{ $slot }}
        </div>
    </div>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/js/sweetalert2@10.js') }}"></script><!-- sweetalert2 -->
    <script type="text/javascript" src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const message = "{{ $error }}";
        const type = "error";
        Toast.fire({
        icon: type,
        title: message
        })
    });  
    </script>
    @endforeach
    @endif
</body>

</html>