
@include('template_admin.header')
<body id="page-top">
    <div id="wrapper">
        @include('template_admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('template_admin.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('template_admin.footer')
        </div>
    </div>
</body>
</html>
