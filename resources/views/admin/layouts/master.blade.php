<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('styles', '');
</head>

<body>
    <div class="wrapper">
        <header id="header">
            @include('admin.partial.header');
        </header>
        <div id="main">
            <div class="main-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="col-inner">
                            <div class="main-sidebar">
                                @include('admin.partial.sidebar.main-sidebar')
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="col-inner">
                            <div class="main-content">
                                @include('admin.pages.dashboard.index')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer id="footer">
            @include('admin.partial.footer');
        </footer>
    </div>
</body>

</html>
