<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <style type="text/css">
            .hidden {display:none;}
          </style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (app()->environment('production'))
            @php
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
            @endphp
            <link href="/build/assets/app-DZiTm8wo.css" type="text/css" rel="stylesheet">
            <script ype="text/javascript" src="/build/assets/app-CbEvcXly.js" defer></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <script type="text/javascript">
            $('html').addClass('hidden');
            $(document).ready(function() {    // EDIT: From Adam Zerner's comment below: Rather use load: $(window).on('load', function () {...});
              $('html').show();  // EDIT: Can also use $('html').removeClass('hidden'); 
             });  
           </script>
    
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen  dark:bg-white-900">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
