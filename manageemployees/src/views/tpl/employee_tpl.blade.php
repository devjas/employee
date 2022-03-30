<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex,nofollow">
    @php header('X-Robots-Tag: noindex, nofollow'); @endphp
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    @include('emp::partials._style')
</head>
<body class="body-bg">
    @include('emp::partials._nav')
    
    @include('emp::partials._messages')

    @yield('content')

    @include('emp::partials._footer')
</body>
</html>