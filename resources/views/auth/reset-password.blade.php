<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Forgot passwrod</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">

            @if (!empty($errors->messages()['token']))
                <p class="alert alert-danger">{{ $errors->messages()['token'][0] }}</p>
            @endif
            <form action="{{ route('auth.reset_password') }}"method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}" />


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
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</body>

</html>
