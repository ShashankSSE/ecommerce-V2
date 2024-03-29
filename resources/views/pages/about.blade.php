@extends('components.app')
@section('title', 'Patakah | About Us')
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
                            <h2 class="mt-2">Empowering Growth Through Innovation: <span style="color:#fc861b;">Unveiling the Journey Patakah</span></h2>
                        </div>
                        <p class="mb-4">Patakah, a leading India- based startup with over a decade of experience in software development and AI-based programs. At Patakah, we are committed to delivering innovative and customized solutions that cater to the unique needs of businesses across different industries. With our team of experts and our commitment to excellence, we help businesses optimize operations, increase efficiency, and generate valuable insights.</p>
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
                            <!-- <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a> -->
                            <!-- <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>-->
                            <a class="btn btn-outline-primary btn-square" href="https://www.linkedin.com/company/Patakahr/"><i class="fab fa-linkedin-in"></i></a> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('assets/img/about.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @include('components.items.faq')

<script>
    $(document).ready(function(){
        $("#hero-header").hide(); 
        $("#faqRead").hide(); 
        $("#about-hero").show();
        $("#accorOne").show();
        $("#accorTwo").show();
    })
</script>
@endsection