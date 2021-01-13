<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Sistema de cobranças') - {{ config('app.name', 'Laravel') }}</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('svgs/favicon.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito';
                font-weight: 400;
                font-size: .85rem;
                background: #eee;
            }

            .h1, .h2, .h3, .h4, .h5, .h6 {
                font-weight: 700;
                letter-spacing: -0.03rem;
            }

            .dropdown-menu { font-size: .9rem; }

            .btn { font-weight: 600; letter-spacing: -0.025rem; }

            .breath-table-action {
                text-align: center;
                border-left: #ddd 2px solid;
            }

            .breath-table-action .btn {
                font-size: 12px;
                opacity: .6;
            }
            .breath-table-action .btn:hover {
                opacity: 1;
            }

            .breath-breadcrumbs {
                font-size: .85rem;
                text-transform: lowercase;
            }
            .breath-breadcrumbs a {
                text-decoration: none;
                color: #333;
            }

            .breath-card-footer {
                background: #d1e7dd;
                position: sticky;
                bottom: 0;
            }

            .opacity-50 { opacity: .5; }
            .opacity-25 { opacity: .25; }

            .toast-body a { color: #fff; }
            .form-control { font-size: .9rem; font-weight: 600; }

            hr { background-color: #999; }

            .table { white-space:nowrap; }
            .table th { padding: 12px 16px; text-transform: uppercase; font-size: .65rem; font-weight: 800; color: #555; }
            .table td { padding: 12px 16px; }

            .breath-param {
                display: block;
                background: #f4f4f4;
                padding: 15px 20px;
            }
            .breath-param .title {
                color: #777;
                font-size: .65rem;
                text-transform: uppercase;
                display: block;
                font-weight: 900;
            }
            .breath-param .value {
                display: block;
                font-weight: 600;
            }
            .breath-param.danger { background: #d1e7dd; }
            .breath-param.success { background: #f8d7da;  }
            .breath-param.warning { background: #fff3cd; }
            
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

            <x-breath::footer/>
        </div>
    </body>
</html>

