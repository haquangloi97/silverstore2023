<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SilverStore.com | Chuyên các sản phẩm Apple</title>
    <base href="{{ asset('/') }}">
    <link rel="stylesheet" href="front/css/bootstrap.css">
    <link rel="stylesheet" href="front/css/style.css">
    <link rel="stylesheet" href="front/css/all.css">
    <link rel="stylesheet" href="front/css/owl.carousel.css">
    <link rel="stylesheet" href="front/css/owl.theme.default.css">
    <script src="front/js/bootstrap.js"></script>
    <script src="front/js//jquery-3.6.4.js"></script>
</head>
<body class="bg-light">
<!--Header-->
@include('front.header')
<!--End Header-->

@yield('body')

</body>
</html>
