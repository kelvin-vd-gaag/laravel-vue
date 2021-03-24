<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Temporary - Register</title>
</head>
<body>
<div class="container">
    <div class="form">
        <div class="logo">
            <img src="{{asset('/images/logo.png')}}" alt="Logo of the website">
        </div>
        <div class="welcome">
            <h1>Welcome</h1>
            <span>It's so nice to see you</span>
        </div>
        <div class="call-to-action-form">
            <span>Log in</span>
        </div>
        <div class="form-action">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input type="text" name="name" id="name" placeholder="Username" value="{{ old('name') }}" required
                       autofocus>
                @error('user')
                <span class="invalid-feedback" role="alert">
                                        <strong class="error-message-authentication">{{ $message }}</strong>
                                    </span>
                @enderror

                <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}" required
                       autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong class="error-message-authentication">{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="password" name="password" id="password" placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                       <strong class="error-message-authentication">{{ $message }}</strong>
                                    </span>
                @enderror

                <input type="password" name="password_confirmation" id="password-confirm" placeholder="Password confirm"
                       required>

                <button>
                    {{ __('Register') }}
                </button>
                <span>Already have an account? <a href="{{url('/login')}}">Login</a> instead.</span>
            </form>
        </div>
    </div>
    <div class="background-top">

    </div>
    <div class="background-bottom">

    </div>
</div>
</body>
</html>
