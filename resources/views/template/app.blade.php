<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - @yield('page_title')</title>

    @vite('resources/js/app.js')
</head>

<body>
    <div class="wrapper">
        @include('partials.header')
        <main>
            @yield('main')
        </main>
        @include('partials.footer')
    </div>
</body>

</html>
