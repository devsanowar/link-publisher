<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard | Link Publisher </title>

    @include('publisher.layouts.inc.style')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        @include('publisher.layouts.inc.sidebar')

        <!-- Main Content -->
        <div class="content w-100">
            @include('publisher.layouts.inc.header')

            <div class="container-fluid mt-3 main-dashboard-home">
                @yield('publisher_contents')
            </div>
        </div>
    </div>

    @include('publisher.layouts.inc.script')
</body>

</html>