<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard | Link Publisher </title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="assets/css/all.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Dashboard CSS -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <!-- Favicon (Optional) -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('publisher.layouts.inc.sidebar')

        <!-- Main Content -->
        <div class="content w-100">
            @include('publisher.layouts.inc.header')

            <div class="container-fluid mt-3 main-dashboard-home">
                <div class="alert alert-success">
                    Tax information needed - <a href="#" class="alert-link">Click here</a> to complete your profile to
                    withdraw funds.
                </div>

                @yield('publisher_contents')
            </div>
        </div>
    </div>

    @include('publisher.layouts.inc.script')
</body>

</html>