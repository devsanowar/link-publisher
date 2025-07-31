<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | Link Publisher </title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('publisher') }}/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('publisher') }}/assets/css/all.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link href="{{ asset('publisher') }}/assets/css/style.css" rel="stylesheet">

    <!-- Favicon (Optional) -->
    <link rel="icon" href="{{ asset('publisher') }}/assets/images/favicon.png" type="image/png">


</head>

<body>

    <main>
        <!-- Registration Page Section -->
        <section class="register-section">
            <div class="container">
                <!-- Site Logo -->
                <!-- <div class="mb-4 text-center">
                    <img src="assets/images/link-logo.PNG" alt="Logo" class="img-fluid rounded">
                </div> -->
                <div class="container-fluid py-5 register-forms">
                    <div class="mb-4 text-center">
                        <a href="index.html"><img src="{{ asset('publisher') }}/assets/images/logo.png" alt="Logo" class="img-fluid rounded"></a>
                    </div>
                    <div class="row no-gutters   rounded overflow-hidden ">
                        <!-- Left Column -->
                        <div class="col-lg-6 p-5 d-flex flex-column form-content">

                            <!-- Register Form -->
                            <h2 class="mb-4">Login </h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="custom-form" action="{{ route('publisher.login') }}" method="POST">
                                @csrf
                                <!-- Email -->
                                <div class="form-group position-relative">
                                    <i class="fas fa-envelope icon-left"></i>
                                    <input type="email" id="email" name="email" class="form-control border-bottom-only"
                                        placeholder="Email Address" required>
                                </div>

                                <!-- Password -->
                                <div class="form-group position-relative">
                                    <i class="fas fa-lock icon-left"></i>
                                    <input type="password" name="password" id="password" class="form-control border-bottom-only"
                                        placeholder="Password" required>
                                </div>

                                <!-- Remember Me + Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <div>
                                        <a href="#" class="forgot-link">Forgot Password?</a>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn-primary-custom mt-4">Login</button>

                                <div class="or-divider my-3">
                                    <span>OR</span>
                                </div>
                                <!-- Google Button -->
                                <button type="button" class="btn-google-custom mt-3">
                                    <i class="fab fa-google"></i> Register with Google
                                </button>

                                <!-- Login Link -->
                                <p class="login-text">
                                    Don’t have an account? <a href="{{ route('register.index') }}">Sign up for free</a>
                                </p>

                            </form>


                        </div>

                        <!-- Right Column (Avatar Image) -->
                        <div class="col-lg-6 bg-avatar2 d-none d-lg-block" style="background-image: url('{{ asset('publisher') }}/assets/images/login.png');"></div>
                    </div>
                </div>

            </div>
        </section>

    </main>


    <!-- Bootstrap JS (with Popper) -->
    <script src="{{ asset('publisher') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="{{ asset('publisher') }}/assets/js/all.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('publisher') }}/assets/js/script.js"></script>




</body>

</html>