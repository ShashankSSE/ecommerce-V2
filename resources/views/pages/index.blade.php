@extends('components.app')
@section('title', '99mentor')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
    <!-- About Start --> 
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">About Us</h6>
                        <h2 class="mt-2">Creating custom solutions to precisely match clients' distinct business requirements.</h2>
                    </div>
                    <p class="mb-4"></p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Solution with lifetime validity</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Mock Test/Assessment</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Gyan Sangam/Doubt Solver App</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>100% Customisation</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="/about">Read More</a>
                        <!-- <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a> -->
                        <a class="btn btn-outline-primary btn-square" href="https://www.linkedin.com/company/99mentorr/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('assets/img/about.jpg')}}">
                </div>
            </div>
        </div>
    </div> 
    <!-- About End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                <h2 class="mt-2">What Solutions We Provide</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Learning Management Solutions (LMS)</h5>
                        <p>With a focus on innovation and excellence, we deliver customised services that drive business growth.</p>
                        <a class="btn px-3 mt-auto mx-auto" href="/product-and-services#lms">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Mock Test/Assessment</h5>
                        <p>Enhance learning outcomes with our robust tools, providing a evaluation experience for students to achieve academic success.</p>
                        <a class="btn px-3 mt-auto mx-auto" href="/product-and-services#test">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Gyan Sangam/Doubt Solver App</h5>
                        <p>an innovative platform for collaborative learning, knowledge sharing, and efficient doubt resolution</p>
                        <a class="btn px-3 mt-auto mx-auto" href="/product-and-services#doubt">Read More</a>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-home fa-2x"></i>
                        </div>
                        <h5 class="mb-3">CTO as a service</h5>
                        <p>We drive a culture of continuous improvement, encouraging regular assessments and refinements</p>
                        <a class="btn px-3 mt-auto mx-auto" href="/product-and-services#cto">Read More</a>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    @include('components.items.contact-form')
    @include('components.items.faq')
 
@endsection