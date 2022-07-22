<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            @auth
                <p><a href="{{ route('auth.send_verify_account') }}" class="link">Verify Account</a></p>
            @endauth
            <p><a href="{{ route('auth.logout') }}" class="btn btn-danger">Logout</a></p>
        </div>
    </div>
</body>

</html>
