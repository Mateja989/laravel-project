<html>
<head>
    @include('common.client.head')
    @yield('title')
</head>
<body>

    @include('common.client.navigation')

    @yield('content')


    @include('common.client.footer')
    @include('common.client.scripts')
</body>
</html>
