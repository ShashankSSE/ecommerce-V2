<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', '99mentor')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="description" content="@yield('meta_description', '')">
        <meta name="keywords" content="@yield('meta_keywords', '')">

    <!-- Favicon -->
    <link href="{{asset('assets/img/logo.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body class="bg-white">

@include('components.header')

@include('components.items.book-demo')
@include('components.items.get-broucher')
<div class=" py-5  bg-primary hero-header mb-5" id="hero-header">
    <div class=" my-5  px-lg-5">
        <div class="row my-5 ">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated zoomIn">All in one LMS Software to grow your business rapidly</h1>
                <p class="text-white pb-3 animated zoomIn">Empower learning with our LMS software offering Unlimited Live lectures, Unlimited VOD (recorded) sessions, and comprehensive Mock Test/Assessment features for a holistic educational experience.</p>
                <a href="#" data-toggle="modal" data-target="#getBroucher" class="btn btn-light my-5  px-sm-5 rounded-pill me-3 animated slideInLeft">Get Broucher</a>
                <a href="/contact" class="btn btn-outline-light my-5  px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid" src="{{asset('assets/img/hero-bg.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>
<div class=" py-5 bg-primary hero-header mb-5" id="services-hero" style="display:none;">
    <div class="my-5  px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Product & Services</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-gray" href="/">Home</a></li>
                        <li class="breadcrumb-item text-gray">Pages</li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class=" py-5 bg-primary hero-header mb-5" id="about-hero" style="display:none;">
    <div class="my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">About</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-gray" href="/">Home</a></li>
                        <li class="breadcrumb-item text-gray">Pages</li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class=" py-5 bg-primary hero-header mb-5" id="contact-hero" style="display:none;">
    <div class="my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Contact</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-gray" href="/">Home</a></li>
                        <li class="breadcrumb-item text-gray">Pages</li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class=" py-5 bg-primary hero-header mb-5" id="privacy-hero" style="display:none;">
    <div class="my-5 ">
        <div class="row g-5 my-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Privacy Policy</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-gray" href="/">Home</a></li>
                        <li class="breadcrumb-item text-gray">Pages</li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
                <div style="display:flex;    justify-content: center;"><p style="color:white; width:70%;"> Accessing this website, by participating in our data collection outreach initiatives, and/or by availing any of the services, you agree to the terms of this Data Privacy and Protection Policy.</p></div>
            </div>
        </div>
    </div>
</div>
<div class=" py-5 bg-primary hero-header mb-5" id="terms-hero" style="display:none;">
    <div class="my-5 ">
        <div class="row g-5 my-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated zoomIn">Terms & Conditions</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-gray" href="/">Home</a></li>
                        <li class="breadcrumb-item text-gray">Pages</li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Terms & Conditions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Spinner End -->
        @yield('content')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>
        <!-- Service End -->
        <!-- Newsletter Start -->
        <div class="bg-primary newsletter py-5 wow fadeInUp" id="newsletter" data-wow-delay="0.1s">
            <div class=" px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Ready to get started</h3>
                        <small class="text-white">Interested ? Shere your email to get in touch with us.</small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid" style="height: 250px;" src="{{asset('assets/img/newsletter.png')}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->
    @include('components.footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/lib/lightbox/js/lightbox.min.js')}}"></script>  

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>