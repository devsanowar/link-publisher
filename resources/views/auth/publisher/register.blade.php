<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Register | Link Publisher </title>

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
                <div class="container-fluid  register-forms">
                    <div class="mb-2 text-center">
                        <a href="index.html"><img src="{{ asset('publisher') }}/assets/images/logo.png" alt="Logo" class="img-fluid rounded"></a>
                    </div>
                    <div class="row no-gutters   rounded overflow-hidden ">
                        <!-- Left Column -->
                        <div class="col-lg-6 p-2 d-flex flex-column form-content">

                            <!-- Register Form -->
                            <h2 class="mb-2 signup-title-text">Sign up for free</h2>
                            <form class="custom-form" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <!-- Full Name -->
                                <div class="form-group position-relative">
                                    <i class="fas fa-user icon-left"></i>
                                    <input type="text" id="fullName" class="form-control border-bottom-only" name="name"
                                        placeholder="Full Name" required>
                                </div>

                                <!-- Email -->
                                <div class="form-group position-relative">
                                    <i class="fas fa-envelope icon-left"></i>
                                    <input type="email" id="email" name="email" class="form-control border-bottom-only"
                                        placeholder="Email Address" required>
                                </div>

                                <!-- Password -->
                                <div class="form-group position-relative">
                                    <i class="fas fa-lock icon-left"></i>
                                    <input type="password" id="password" name="password" class="form-control border-bottom-only"
                                        placeholder="Password" required>
                                </div>

                                <!-- Role Selection -->
                                <div class="form-group role-select">
                                    <label class="d-block mb-2 font-weight-bold">Select Role</label>
                                    <div class="custom-role-btns d-flex justify-content-between">
                                        <label class="role-option advisor">
                                            <input type="radio" name="system_admin" value="advisor" required>
                                            <div class="role-content">
                                                <i class="fas fa-user-tie"></i>
                                                <span>Advisor</span>
                                            </div>
                                        </label>

                                        <label class="role-option publisher">
                                            <input type="radio" name="system_admin" value="publisher" required>
                                            <div class="role-content">
                                                <i class="fas fa-bullhorn"></i>
                                                <span>Publisher</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn-primary-custom mt-2">Register</button>

                                <div class="or-divider my-3">
                                    <span>OR</span>
                                </div>
                                <!-- Google Button -->
                                <button type="button" class="btn-google-custom mt-3">
                                    <i class="fab fa-google"></i> Register with Google
                                </button>

                                <!-- Login Link -->
                                <p class="login-text">
                                    Already have an account? <a href="{{ route('loginForm') }}">Login here</a>
                                </p>

                            </form>


                        </div>

                        <!-- Right Column (Avatar Image) -->
                        <div class="col-lg-6 bg-avatar d-none d-lg-block" style="background-image: url('{{ asset('publisher') }}/assets/images/register.png');"></div>
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