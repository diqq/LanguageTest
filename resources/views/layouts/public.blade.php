<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <title>{{ $title }} | Widyamata Language Institute</title>
</head>

<body id="top" class="bg-gray-50 dark:bg-gray-900"">
    @include('partials.publicNavbar')
    <div class="mx-auto max-w-7xl max-md:px-2 pt-28">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/public.js') }}"></script>
    @stack('script')
</body>

</html>
