<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - @yield('page_title')</title>

    @vite('resources/js/app.js')

    @yield('css')
</head>

<body>
    <div class="wrapper">
        @include('partials.header')
        <main>

            @if (session('message'))
                <div class="container mt-4">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @yield('main')
        </main>
        @include('partials.footer')
    </div>

    @yield('modal')
</body>

</html>
