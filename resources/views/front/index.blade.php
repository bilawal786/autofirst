@extends('layouts.front')
@section('content')
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
                                <form method="POST" action="{{route('front.find.car')}}">
                                    @csrf
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
                                                        <div required="" class="input-group group-form">
                                                            <input type="text" name="departure_date" id="departure_date" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
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
                                                        <label class="fs-14 text-custom-black fw-500"> Date de retour </label>
                                                        <div class="input-group group-form">
                                                            <input required="" type="text" name="return_date" class="form-control form-control-custom datepickr" placeholder="mm/dd/yy" readonly>
                                                            <span class="input-group-append"> <i class="far fa-calendar"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <div class="group-form">
                                                            <select name="return_time" class="custom-select form-control form-control-custom">
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
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <button class="btn-first btn-submit full-width btn-height">CHERCHER</button>
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
@endsection
