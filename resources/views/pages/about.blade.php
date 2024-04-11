@extends('components.app')
@section('title', 'Patakha | About Us')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
 

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="heading">
                    About Us
                </div>
            </div>
        </div>
        <section id="about-us">
            <div class="container ">
                <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="image-holder">
                    <img src="{{asset('images/site/single-image1.jpg')}}" alt="single" class="about-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="detail">
                        <div class="display-header">
                            <h2 class="section-title">How was Patakha Store started?</h2>
                            <p></p>
                        </div>
                    </div> 
                </div>
                </div>
            </div>
            </section>
        <!-- About End -->
        
<style>
    .heading{
        font-size: 45px;
        color: black;
        font-weight: 700;
        text-align: center;
        padding-bottom: 50px;
    }
    #about-us{
        margin-bottom:50px;
    }
</style>
<script> 
</script>
@endsection