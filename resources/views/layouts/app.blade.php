<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow print:hidden">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Number Formatter -->
            <script>
                function formatMoney(number){
                    return new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(number);
                }

                function formatByComma(number){
                    return number.toLocaleString('id-ID');
                }
            </script>

            <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        </div>
    </body>
</html>
