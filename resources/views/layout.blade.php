<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
        integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">

    <style>
        .btn a {
            color: white;
        }

        .btn a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('currencies') }}" class="nav-link">Currencies</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('show-add-form') }}" class="nav-link">Add</a>
                </li>
            </ul>
        </nav>
    @show

    @yield('heading')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
