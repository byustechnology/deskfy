<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Sistema de cobranças') - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Quicksand';
                font-weight: 600;
                font-size: .85rem;
            }

            .h1, .h2, .h3, .h4, .h5, .h6 { font-weight: 700; }

            .dropdown-menu { font-size: .8rem; }

            .breath-table-action {
                text-align: center;
                border-left: #ddd 2px solid;
            }

            .breath-breadcrumbs { font-size: .75rem; }

            hr { border-bottom: #ddd 2px solid; }

            .table { white-space:nowrap; }
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Header -->
            <x-breath::header/>

            <!-- App errors -->
            <x-breath::app-errors/>
            <x-breath::app-messages/>
            
            <!-- Main content -->
            <main>
                <div class="container my-4">
                {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>

