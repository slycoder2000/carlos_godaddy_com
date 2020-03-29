<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <!-- <script src="https://use.fontawesome.com/4520980e05.js"></script> -->


    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{config('app.name', 'LVLApp')}}</title>

    <!-- <php include('scripts/univ_header.php'); > -->
    @include('inc.header')
    <!-- <link rel="stylesheet" href="app.css"> included with sass now -->

</head>

<body>
    <!-- Nav -->
    <!-- <php include('scripts/univ_menu.php'); > -->
    @include('inc.navbar')

    <!-- End of Nav -->

    <!-- Main Content -->
    <div id="wrapper">

        @yield('content')

        <!-- FOOTER -->
        <!-- <php include('scripts/univ_footer.php'); > -->
        @include('inc.footer')

    </div>


</body>

</html>