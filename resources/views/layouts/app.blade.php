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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @livewireStyles

</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.navigation')
            {{-- <main class="h-full overflow-y-auto"> --}}
                {{ $slot }}
            {{-- </main> --}}

            {{-- <footer>
                <div class="footer  clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; ramy-nagy</p>
                    </div>
                    <div class="float-end">
                        <p> with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="">romeo</a>
                        </p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/alpine.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/js/sweetalert2@10.js') }}"></script><!-- sweetalert2 -->
    <script type="text/javascript" src="{{ asset('assets/js/init-alpine.js') }}"></script>
    
    @livewireScripts
    @stack('scripts')
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
            window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
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