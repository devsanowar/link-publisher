<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Link Publisher</title>

    @include('website.layouts.inc.style')



</head>

<body>
    <!-- Header Start -->
    @include('website.layouts.inc.header')
    <!-- Header End -->
    

    @yield('website_content')
    <!-- Unlock section End -->
    <!-- Footer section Start -->
    @include('website.layouts.inc.footer')



    @include('website.layouts.inc.script')



</body>

</html>