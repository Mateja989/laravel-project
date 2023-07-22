<!DOCTYPE html>
<html lang="en">
    <head>
        @include('common.admin.head')
    </head>
    <body>
        <div class="container-scroller">
            @include('common.admin.sidebar')
            <div class="container-fluid page-body-wrapper">
                @include('common.admin.header')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @include('common.admin.reports')
                        @yield('content')
                    </div>
                    @include('common.admin.footer')
                </div>
            </div>
        </div>
        @include('common.admin.scripts')
    </body>
</html>
