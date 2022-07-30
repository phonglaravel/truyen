<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chu</title>
    @include('page.style')
</head>

<body>
    @include('page.nav')
    @yield('content')
    
    <!-- Remove the container if you want to extend the Footer to full width. -->
    @include('page.footer')
    <!-- End of .container -->



    @include('page.script')
</body>

</html>