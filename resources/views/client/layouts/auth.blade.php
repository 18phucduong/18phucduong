<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">Logo</div>
                    <div class="col-md-4">Main</div>
                    <div class="col-md-4">Right</div>
                </div>
            </div>
        </header>
        <div class="main">
            <section class="section-1">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-6">
                            Image/Banner
                        </div>
                        <div class="col col-md-6">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>
