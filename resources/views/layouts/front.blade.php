<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Auto First</title>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/assets/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/assets/images/favicon.ico')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.ico')}}">
    <!-- Bootstrap -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="{{asset('/assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Flaticons -->
    <link href="{{asset('/assets/css/font/flaticon.css')}}" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="{{asset('/assets/css/slick.css')}}" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{asset('/assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet">
    <!-- Datepicker -->
    <link href="{{asset('/assets/css/datepicker.css')}}" rel="stylesheet">
    <!-- magnific popup -->
    <link href="{{asset('/assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Nice Select -->
    <link href="{{asset('/assets/css/nice-select.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet">

    <!-- CSS for IE -->
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/ie.css')}}" />
    <![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    <!-- place -->
    <style>
        .header .topbar {
            background: #fc802a;
        }
        .btn-submit {
            border-color: #fc802a;
            color: #fc802a;
            background: #fff;
        }
        .about-us h3 {
            color: #fc802a;
        }
        .copyright {
            background-color: #fc802a;
            text-align: center;
            padding-top: 20px;
        }
        #back-top a {
            border: #fc802a solid 1px;
            color: #ffffff;
            background: #fc802a;
        }
        .btn-small:hover, .btn-submit:hover {
            color: #fefefe !important;
        }
        .main-banner .slide-item:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #000;
            opacity: 0;
        }
        @media screen and (min-width: 480px) {

        }
    </style>
</head>
<body>
<!-- Header -->
<!-- Start Topbar -->
<header class="header">
    <div class="topbar bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="leftside">
                        <ul class="custom-flex">
                            <li> <a href="#" class="text-custom-white"><i class="fab fa-facebook-f"></i></a> </li>
                            <li> <a href="#" class="text-custom-white"><i class="fab fa-instagram"></i></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="rightside full-height">
                        <ul class="custom-flex full-height">
                            <li class="book-appointment"> <a href="{{route('front.index')}}#booking"> Réserver maintenant </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="main-navigation">
                            <div class="logo"> <a href="{{route('front.index')}}"> <img src="{{asset('local/logo.png')}}" class="image-fit" alt="logo"> </a> </div>
                            <div class="main-menu">
                                <ul class="custom-flex">
                                    <li class="menu-item active"> <a href="{{route('front.index')}}">Accueil</a> </li>
                                    <li class="menu-item"> <a href="{{route('front.index')}}#carsdiv">Nos voitures</a> </li>
                                    <li class="menu-item"> <a href="{{route('front.index')}}#about">À propos de nous</a> </li>
                                    <li class="menu-item"> <a href="{{route('front.contact')}}">Contact </a> </li>
                                </ul>
                            </div>
                            <div class="hamburger-menu">
                                <div class="menu-btn"> <span></span> <span></span> <span></span> </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Topbar -->

@yield('content')


<!-- Start Footer -->
<footer class="section-padding footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-box mb-md-40">
                    <h4 class="text-custom-white fw-600">À propos de nous</h4>
                    <p class="text-custom-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.Lorem ipsum dolor sit amet...
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-box mb-md-40">
                    <h4 class="text-custom-white fw-600">Contact</h4>
                    <ul class="m-0 p-0 main">
                        <li>1-567-124-44227</li>
                        <li>182 main street pert habour 8007</li>
                    </ul>
                    <ul class="custom-flex socials">
                        <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Start Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-custom-white">© Copyrights - 2022 | <a href="https://spenceragency.fr/">Spencer agency</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Copyright -->
<div id="back-top" class="back-top"> <a href="#top"><i class="flaticon-arrows"></i></a> </div>
<!-- Place all Scripts Here -->
<!-- jQuery -->
<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<!-- Popper -->
<script src="{{asset('/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<!-- Range Slider -->
<script src="{{asset('/assets/js/ion.rangeSlider.min.js')}}"></script>
<!-- Slick Slider -->
<script src="{{asset('/assets/js/slick.min.js')}}"></script>
<!-- Datepicker -->
<script src="{{asset('/assets/js/datepicker.js')}}"></script>
<script src="{{asset('/assets/js/datepicker.en.js')}}"></script>
<!-- Isotope Gallery -->
<script src="{{asset('/assets/js/isotope.pkgd.min.js')}}"></script>
<!-- Nice Select -->
<script src="{{asset('/assets/js/jquery.nice-select.js')}}"></script>
<!-- magnific popup -->
<script src="{{asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<!-- Custom Js -->
<script src="{{asset('/assets/js/custom.js')}}"></script>
<!-- /Place all Scripts Here -->
<script>
    function carselect(elem){
        var rate_per_day =  elem.value;
        var days = $("#days").val();
        var total = days *rate_per_day;
        $("#total").html(total);
        $("#totalamount").val(total);
    }
    function addoptions(elem){
        var value =  elem.value;
        var id =  $(elem).data('id');
        var price =  $(elem).data('price'+id);
        var input =  $(elem).data('input');
        if (input > value){
            var totaloption = value * price;
            var total = $("#totalamount").val();
            var finaltotal = (+total) + (+totaloption);
            $("#total").html(finaltotal);
            $("#totalamount").val(finaltotal);
        }
    }
    function addgurantee(elem){
        var value =  elem.value;
        var id =  $(elem).data('id');
        var price =  $(elem).data('price'+id);
        var input =  $(elem).data('input');
        if (input > value) {
            var totaloption = value * price;
            var total = $("#totalamount").val();
            var finaltotal = (+total) + (+totaloption);
            $("#total").html(finaltotal);
            $("#totalamount").val(finaltotal);
        }
    }
</script>
</body>
</html>
