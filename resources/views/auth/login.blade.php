<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Link Publishers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .login-box .logo {
            display: block;
            margin: 0 auto 20px;
            width: 160px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #fc6b0f;
        }

        .input-group {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            width: 100%;
            height: 45px;
        }



        .input-group-text {
            background-color: transparent;
            border-right: 0;
            color: #fc6b0f;
            font-size: 20px;
        }

        .input-group-text:focus {
            border-color: #fc6b0f;
        }

        .form-control {
            border-left: 0;
        }

        .btn-orange {
            background: linear-gradient(to right, #fc6b0f, #f75402);
            color: white;
            border: none;
            box-shadow: 0px 5px 15px rgba(252, 107, 15, 0.4);
            padding: 8px;
            font-size: 18px;
            border: 1px solid #f75402;
        }

        .btn-orange:hover {
            background: transparent;
            border: 1px solid #f75402;
        }

        .google-btn {
            border: 1px solid #fc6b0f;
            color: #fc6b0f;
            box-shadow: 0px 5px 15px rgba(252, 107, 15, 0.15);
        }

        .google-btn:hover {
            background-color: #fc6b0f;
            color: white;
        }

        .form-check-input:checked {
            background-color: #fc6b0f;
            border-color: #fc6b0f;
        }

        hr {
            opacity: 0.3;
        }
    </style>
</head>

<body>


    <div class="login-box text-center">
        <img src="https://linkpublishers.com/assets/images/logo.png" class="logo" alt="Link Publishers Logo">

        <h4 class="mb-4">Login</h4>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" for="email_address"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" class="form-control" name="email" id="email_address"
                        placeholder="Email Address" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                        autocomplete="current-password" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>


            <!-- Remember + Forgot -->
            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none text-danger">Forgot
                        Password?</a>
                @endif
            </div>

            <!-- Login -->
            <button type="submit" class="btn btn-orange w-100 mb-3">Login</button>

        </form>
    </div>

</body>

</html>
