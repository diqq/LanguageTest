<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-t2c5vI8F9NY5mdlg"></script>

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('css/dataTables.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    @stack('style')

    <title>{{ $title }} | Widyamata Language Institute</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    @include('partials.userNavbar')
    <div class="mx-auto pt-28 max-w-7xl max-md:px-2">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="{{ asset('js/global.js') }}"></script>
    @stack('script')
</body>

</html>
