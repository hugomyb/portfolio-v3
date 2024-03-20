<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Hugo Mayonobe - Laravel Web Developer" />

    <title>{{ isset($title) ? "$title - Hugo Mayonobe" : "Hugo Mayonobe" }}</title>

    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/logo.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo/logo.png') }}" />

    <!-- CSS here -->
    @include('partials.styles')

    @yield('styles')
</head>

<body>

@include('components.preloader')

@include('components.back-to-top')

@include('components.header')

<main class="site-content" id="content">
    @yield('content')
</main>

@include('components.footer')

<!-- JS here -->
@include('partials.scripts')

@yield('scripts')
</body>

</html>
