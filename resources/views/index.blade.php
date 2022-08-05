<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Siamikeu') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>`
<body class="font-sans antialiased">
<nav class="fixed top-0 inset-x-0 bg-slate-50/90 ring-1 ring-slate-900/10 backdrop-blur-sm">
    <div class="container">
        <div class="flex justify-between px-4 py-4">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="/">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </a>
            </div>

            <div>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-primary rounded-full text-white text-sm">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</nav>

<section id="hero" class="pt-48">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full self-center text-center lg:text-left px-4 lg:w-1/2">
                <span class="text-heading font-semibold">Selamat datang di {{ config('app.name', 'Siamikeu') }}</span>
                <h1 class="mt-1 text-2xl lg:text-4xl text-primary font-bold capitalize">{{ config('desc.desc') }} {{ config('desc.instansi') }}</h1>
                <p class="mt-1 text-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad doloremque
                    ea, eius excepturi fugit molestias neque optio qui quos repudiandae saepe similique sint unde
                    vitae?</p>
                <a href="{{ route('login') }}"
                   class="block lg:inline-block mt-3 px-8 py-2 rounded-full lg:rounded-lg text-white bg-primary">Masuk</a>
            </div>
            <div class="w-full self-end mt-10 lg:w-1/2 lg:mt-0">
                <img src="{{ asset('img/undraw_accept_terms_re_lj38 (1).svg') }}" alt="Checklist"
                     class="max-w-full mx-auto">
            </div>
        </div>
    </div>
</section>
</body>
</html>
