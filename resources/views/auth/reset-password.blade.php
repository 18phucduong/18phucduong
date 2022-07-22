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
            <form action="{{ route('auth.reset_password') }}"method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email">
                    @if (!empty($errors->messages()['email']))
                        <p class="alert alert-danger">{{ $errors->messages()['email'][0] }}</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
</body>

</html>
