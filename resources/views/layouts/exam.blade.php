<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('style')

    <title>{{ $title }} | Widyatama Language Test</title>
</head>

<body id="top" class="relative text-gray-900 bg-gray-50 dark:bg-gray-900 dark:text-white">
    @include('partials.examNavbar')
    <div class="pt-20 mx-auto max-w-7xl max-md:px-2">
        @yield('content')
    </div>
    @include('partials.scrollToTop')
    @include('partials.footer')
    <script src="{{ asset('js/examGlobal.js') }}"></script>
    @stack('script')
</body>

</html>
