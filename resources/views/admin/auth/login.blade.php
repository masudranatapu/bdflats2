@php
$settings = setting();

@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?? 'en' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset($settings->favicon) }}" sizes="96x96" type="image/png" />
    <title>{{ $settings->site_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .signin_form {
        background: #fff !important;
        border: 1px solid #DDD;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 450px;
    }

    .btn-primary {
        height: 49px;
        border-radius: 2px;
        font-size: 16px;
        font-family: 'Raleway', sans-serif;
        font-weight: bold;
        text-transform: uppercase;
    }

    .form-label {
        font-size: 13px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    .form-control {
        height: 50px;
        border: 1px solid #EEE;
        font-size: 14px;
        font-family: 'Raleway', sans-serif;
        font-weight: 500;
        outline: none !important;
        box-shadow: none !important;
    }

    .form-control::placeholder {
        color: #BBB;
    }
</style>

<body style="background-color: #ebedf4;">
    <!--  SignIn  -->
    <div class="signin_sec">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-5">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="signin_form p-3  p-md-5 bg-white">
                            <div class="mb-5 text-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ getLogo($settings->header_logo) }}" width="150" alt="logo">
                                </a>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Admin Email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Enter your email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Admin Password') }}</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('Sign In') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- js file -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
