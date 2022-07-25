@extends('client.layouts.auth')

@section('title', 'Register')

@section('content')
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
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            @if (!empty($errors->messages()['password']))
                <p class="alert alert-danger">{{ $errors->messages()['password'][0] }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPasswordConfirmation">Password Confirmation</label>
            <input type="password" class="form-control" id="exampleInputPasswordConfirmation" placeholder="Password"
                name="password_confirmation">
        </div>

        <div class="form-group">
            <p><span>Have account?</span><a href="{{ route('auth.login') }}"> Login</a></p>
            <p><span>Forgot password?</span><a href="{{ route('auth.login') }}"> Retrieved password</a></p>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
