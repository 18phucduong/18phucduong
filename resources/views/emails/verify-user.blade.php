<!DOCTYPE html>
<html>

<head>
    <title>Verify Account</title>
</head>

<body>
    <h1>Verify Account</h1>

    <p>Click here to verify your account:
        <a href="{{ route('auth.reset_password_view', ['token' => $token]) }}">Here</a>
    </p>
    <p>Thank you</p>
</body>

</html>
