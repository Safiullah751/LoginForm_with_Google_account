<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="\css/style.css">
    <link rel="stylesheet" href="\css/bootstrap.min.css">
</head>
<body>
    <div class="container1">
        <div class="welcome-panel"></div>
        <div class="signin-panel">
            <h2>Sign In</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required >
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="continue-btn">Login</button>
                @error('erroe')
                {{$message}}
                @enderror
                @if (!session('from_register'))
                <p>or make an account !</p>
                <button type="button" class="social-btn twitter-btn"> <a class="sign_up" href="{{route('sign_up')}}">Sign up</a></button>
                <button type="button" class="social-btn facebook-btn"><a class="sign_up" href="{{ url('auth/google') }}"><span class="google-png"><img src="/assets/google.png" alt=""></span>Sign in with Google</a></button>
                @endif



            </form>
        </div>
    </div>
    <script src="\js/bootstrap.bundle.min.js"></script>
</body>
</html>
