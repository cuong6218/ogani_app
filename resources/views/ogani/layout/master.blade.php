<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>
    <base href="{{asset('')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="template/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="template/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="template/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="template/css/style.css" type="text/css">
</head>
<body>
    @include('ogani.layout.header')
    @yield('content')
    @include('ogani.layout.footer')
     <!-- Js Plugins -->
     <script src="template/js/jquery-3.3.1.min.js"></script>
     <script src="template/js/bootstrap.min.js"></script>
     <script src="template/js/jquery.nice-select.min.js"></script>
     <script src="template/js/jquery-ui.min.js"></script>
     <script src="template/js/jquery.slicknav.js"></script>
     <script src="template/js/mixitup.min.js"></script>
     <script src="template/js/owl.carousel.min.js"></script>
     <script src="template/js/main.js"></script>
</body>