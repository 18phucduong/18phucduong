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

            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email">
                    @if (!empty($errors->messages()['email']))
                        <p class="alert alert-danger">{{ $errors->messages()['email'][0] }}</p>
                    @endif

                </div>
                <div class="form-group">
                    <label for="exampleInputUsername">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Enter username"
                        name="user_name">
                    @if (!empty($errors->messages()['user_name']))
                        <p class="alert alert-danger">{{ $errors->messages()['user_name'][0] }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password">
                    @if (!empty($errors->messages()['password']))
                        <p class="alert alert-danger">{{ $errors->messages()['password'][0] }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPasswordConfirmation">Password Confirmation</label>
                    <input type="password" class="form-control" id="exampleInputPasswordConfirmation"
                        placeholder="Password" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
