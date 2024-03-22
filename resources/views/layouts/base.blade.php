<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss'])
</head>

<body @class([Auth::check() ? 'authenticated' : 'guest'])>

    @hasSection('breadcrumb')
        <div class="bg-brand">
            <div class="container">
                @yield('breadcrumb')
            </div>
        </div>
    @endif

    <main class="container">
        @yield('content')
    </main>

    @vite(['resources/ts/app.ts'])
</body>

</html>
