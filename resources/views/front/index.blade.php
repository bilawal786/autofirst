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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon.ico">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Flaticons -->
    <link href="assets/css/font/flaticon.css" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="assets/css/ion.rangeSlider.min.css" rel="stylesheet">
    <!-- Datepicker -->
    <link href="assets/css/datepicker.css" rel="stylesheet">
    <!-- magnific popup -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Nice Select -->
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!-- CSS for IE -->
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    <!-- place -->
    <style>
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
                            <li class="book-appointment"> <a href="#"> Réserver maintenant </a> </li>
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
                                    <li class="menu-item"> <a href="#">Nos voitures</a> </li>
                                    <li class="menu-item"> <a href="#">À propos de nous</a> </li>
                                    <li class="menu-item"> <a href="#">Contact </a> </li>
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
<!-- Header -->
<!-- Start Slider -->
<div class="slider p-relative">
    <div class="main-banner arrow-layout-1 ">
        <div class="slide-item"> <img src="assets/images/car-1.jpg" class="image-fit" alt="Slider">
            <div class="transform-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="slider-content">
<!--                                <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span> through your app!</h1>
                                <ul class="custom">
                                    <li class="text-custom-white"> <i class="fas fa-dollar-sign"></i> Best Price Guaranteed </li>
                                    <li class="text-custom-white"> <i class="fas fa-car"></i> Home Pickups </li>
                                    <li class="text-custom-white"> <i class="fas fa-laptop"></i> Easy Bookings </li>
                                    <li class="text-custom-white"> <i class="fas fa-headphones-alt"></i> 24/7 Customer Care </li>
                                </ul>
                                <a href="cars.html" class="btn-first btn-small">Find Out More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item"> <img src="assets/images/car-1.jpg" class="image-fit" alt="Slider">
            <div class="transform-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="slider-content">
<!--                                <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span> through your app!</h1>
                                <ul class="custom">
                                    <li class="text-custom-white"> <i class="fas fa-dollar-sign"></i> Best Price Guaranteed </li>
                                    <li class="text-custom-white"> <i class="fas fa-car"></i> Home Pickups </li>
                                    <li class="text-custom-white"> <i class="fas fa-laptop"></i> Easy Bookings </li>
                                    <li class="text-custom-white"> <i class="fas fa-headphones-alt"></i> 24/7 Customer Care </li>
                                </ul>
                                <a href="cars.html" class="btn-first btn-small">Find Out More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Slider -->
<!-- Start Banner tabs -->
<div class="banner-tabs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <div class="tab-content padding-20">
                        <div class="tab-pane active" id="cars">
                            <div class="tab-inner">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-group">
                                                <label class="fs-14 text-custom-black fw-500">Agence de départ</label>
                                                <select name="start_point" class="custom-select form-control form-control-custom">
                                                    <option value="Aéroport Pôle Caraïbes">Aéroport Pôle Caraïbes</option>
                                                    <option value="Agence Baie-Mahault">Agence Baie-Mahault</option>
                                                    <option value="Agence Sainte-Anne">Agence Sainte-Anne</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="fs-14 text-custom-black fw-500">Agence de retour</label>
                                                <select name="end_point" class="custom-select form-control form-control-custom">
                                                    <option value="Aéroport Pôle Caraïbes">Aéroport Pôle Caraïbes</option>
                                                    <option value="Agence Baie-Mahault">Agence Baie-Mahault</option>
                                                    <option value="Agence Sainte-Anne">Agence Sainte-Anne</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Date de départ</label>
                                                        <div class="input-group group-form">
                                                            <input type="text" name="date_depart" id="departure_date" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
                                                            <span class="input-group-append"> <i class="far fa-calendar"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom" name="departure_time" id="time_depart" required>
                                                                <option value="06:00">06:00</option>
                                                                <option value="06:30">06:30</option>
                                                                <option value="07:00">07:00</option>
                                                                <option value="07:30">07:30</option>
                                                                <option value="08:00">08:00</option>
                                                                <option value="08:30">08:30</option>
                                                                <option value="09:00">09:00</option>
                                                                <option value="09:30">09:30</option>
                                                                <option value="10:00">10:00</option>
                                                                <option value="10:30">10:30</option>
                                                                <option value="11:00">11:00</option>
                                                                <option value="11:30">11:30</option>
                                                                <option value="12:00">12:00</option>
                                                                <option value="12:30">12:30</option>
                                                                <option value="13:00">13:00</option>
                                                                <option value="13:30">13:30</option>
                                                                <option value="14:00">14:00</option>
                                                                <option value="14:30">14:30</option>
                                                                <option value="15:00">15:00</option>
                                                                <option value="15:30">15:30</option>
                                                                <option value="16:00">16:00</option>
                                                                <option value="16:30">16:30</option>
                                                                <option value="17:00">17:00</option>
                                                                <option value="17:30">17:30</option>
                                                                <option value="18:00">18:00</option>
                                                                <option value="18:30">18:30</option>
                                                                <option value="19:00">19:00</option>
                                                                <option value="19:30">19:30</option>
                                                                <option value="20:00">20:00</option>
                                                                <option value="20:30">20:30</option>
                                                                <option value="21:00">21:00</option>
                                                                <option value="21:30">21:30</option>
                                                                <option value="22:00">22:00</option>
                                                                <option value="22:30">22:30</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="fs-14 text-custom-black fw-500">Drop Off Date/Time</label>
                                                        <div class="input-group group-form">
                                                            <input type="text" name="#" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
                                                            <span class="input-group-append"> <i class="far fa-calendar"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <div class="group-form">
                                                            <select class="custom-select form-control form-control-custom">
                                                                <option>Anytime</option>
                                                                <option>Morning</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <button class="btn-first btn-submit full-width btn-height">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner tabs -->
<!-- Start About Us -->
<section class="section-padding about-us">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-6 pl-2 pr-2 align-self-center text-left">
                <div class="about-left-side mb-md-80">
                    <div class="section-header style-left">
                        <div class="section-heading">
                            <h3 class="text-custom-black">Subaru Impreza</h3>
                            <div class="section-description">
                                <div class="car-price"> <strong>$125</strong> <span>/Day</span> </div>
                            </div>
                        </div>
                    </div>
                    <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                    <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                    <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text.
                        Lorem Ipsum is simply dummy.</p>
                    <a href="about.html" class="btn-first btn-submit">Reserve Now</a> </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="about-right-side full-height">
                    <div class="about-img full-height">
                        <img src="assets/images/about.jpg" class="img-fluid image-fit" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us -->

<!-- Recommended Cars -->
<section class="section-padding car-booking">
    <div class="container">
        <div class="section-header text-center">
            <div class="section-heading">
                <h3 class="text-custom-black">Recommended Cars</h3>
                <div class="section-description">
                    <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="car-slider arrow-layout-2 row">
                    <div class="slide-item col-12">
                        <div class="car-grid">
                            <div class="car-grid-wrapper car-grid bx-wrapper">
                                <div class="image-sec animate-img"> <a href="car-detail.html"> <img src="assets/images/cars/1.png" class="full-width" alt="img"> </a> </div>
                                <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                    <h4 class="title fs-16"><a href="car-detail.html" class="text-custom-black">Economy<small class="text-light-dark">Per day</small></a></h4>
                                    <span class="price"><small>From</small>$20</span>
                                    <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                    <div class="action"> <a class="btn-second btn-small" href="car-detail.html">View</a> <a class="btn-first btn-submit yellow" href="booking.html">Book</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item col-12">
                        <div class="car-grid">
                            <div class="car-grid-wrapper car-grid bx-wrapper">
                                <div class="image-sec animate-img"> <a href="car-detail.html"> <img src="assets/images/cars/2.png" class="full-width" alt="img"> </a> </div>
                                <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                    <h4 class="title fs-16"><a href="car-detail.html" class="text-custom-black">Deluxe<small class="text-light-dark">Per day</small></a></h4>
                                    <span class="price"><small>From</small>$35</span>
                                    <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                    <div class="action"> <a class="btn-second btn-small" href="car-detail.html">View</a> <a class="btn-first btn-submit yellow" href="booking.html">Book</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item col-12">
                        <div class="car-grid">
                            <div class="car-grid-wrapper car-grid bx-wrapper">
                                <div class="image-sec animate-img"> <a href="car-detail.html"> <img src="assets/images/cars/3.png" class="full-width" alt="img"> </a> </div>
                                <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                    <h4 class="title fs-16"><a href="car-detail.html" class="text-custom-black">Patinum<small class="text-light-dark">Per day</small></a></h4>
                                    <span class="price"><small>From</small>$50</span>
                                    <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                    <div class="action"> <a class="btn-second btn-small" href="car-detail.html">View</a> <a class="btn-first btn-submit yellow" href="booking.html">Book</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item col-12">
                        <div class="car-grid">
                            <div class="car-grid-wrapper car-grid bx-wrapper">
                                <div class="image-sec animate-img"> <a href="car-detail.html"> <img src="assets/images/cars/4.png" class="full-width" alt="img"> </a> </div>
                                <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                    <h4 class="title fs-16"><a href="car-detail.html" class="text-custom-black">Delux<small class="text-light-dark">Per day</small></a></h4>
                                    <span class="price"><small>From</small>$68</span>
                                    <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                    <div class="action"> <a class="btn-second btn-small" href="car-detail.html">View</a> <a class="btn-first btn-submit yellow" href="booking.html">Book</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item col-12">
                        <div class="car-grid">
                            <div class="car-grid-wrapper car-grid bx-wrapper">
                                <div class="image-sec animate-img"> <a href="car-detail.html"> <img src="assets/images/cars/5.png" class="full-width" alt="img"> </a> </div>
                                <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                    <h4 class="title fs-16"><a href="car-detail.html" class="text-custom-black">Economy<small class="text-light-dark">Per day</small></a></h4>
                                    <span class="price"><small>From</small>$58</span>
                                    <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                    <div class="action"> <a class="btn-second btn-small" href="car-detail.html">View</a> <a class="btn-first btn-submit yellow" href="booking.html">Book</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Car -->

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
                <p class="text-custom-white">© Copyrights - 2022 | <a href="https://ikaedigital.com/">Ikae Digital</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Copyright -->
<div id="back-top" class="back-top"> <a href="#top"><i class="flaticon-arrows"></i></a> </div>
<!-- Place all Scripts Here -->
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- Popper -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Range Slider -->
<script src="assets/js/ion.rangeSlider.min.js"></script>
<!-- Slick Slider -->
<script src="assets/js/slick.min.js"></script>
<!-- Datepicker -->
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/datepicker.en.js"></script>
<!-- Isotope Gallery -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- Nice Select -->
<script src="assets/js/jquery.nice-select.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<!-- Custom Js -->
<script src="assets/js/custom.js"></script>
<!-- /Place all Scripts Here -->
</body>
</html>
