<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" >
        <link rel="stylesheet" type="text/CSS" href="{{URL::to('assets/css/style.css')}}" >
        <link rel="stylesheet" href="{{URL::to('assets/css/all.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/css/bootstrap.css')}}">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <title>Le code</title>


        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

        <!-- title of site -->

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href=" {{URL::to('assets/logo/favicon.png')}}"/>

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href=" {{URL::to('assets/css/font-awesome.min.css')}}">

        <!--linear icon css-->
		<link rel="stylesheet" href=" {{URL::to('assets/css/linearicons.css')}}">

        <!--flaticon.css-->
		<link rel="stylesheet" href=" {{URL::to('assets/css/flaticon.css')}}">

		<!--animate.css-->
        <link rel="stylesheet" href=" {{URL::to('assets/css/animate.css')}}">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href=" {{URL::to('assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href=" {{URL::to('assets/css/owl.theme.default.min.css')}}">

        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{URL::to('assets/css/bootstrap.min.css')}}">

		<!-- bootsnav -->
		<link rel="stylesheet" href=" {{URL::to('assets/css/bootsnav.css')}}" >

        <!--style.css-->
        <link rel="stylesheet" href=" {{URL::to('assets/css/styles.css')}}">

        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css {{URL::to('assets/css/responsive.css')}}">

    </head>
    <body>

        @include("layouts.header")

            {{$slot}}

        @include("layouts.footer")


    </body>
    <script src="{{URL::to('assets/js/main.js')}}"></script>
    <script src="{{URL::to('assets/js/jquery.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>
