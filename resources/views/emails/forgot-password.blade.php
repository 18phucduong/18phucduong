<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <h1>Forgot password mail</h1>


    <p>Click here to change your password:
        <a href="{{ route('auth.reset_password_view', ['token' => $token]) }}">Here</a>
    </p>
    <p>Thank you</p>
</body>

</html>
