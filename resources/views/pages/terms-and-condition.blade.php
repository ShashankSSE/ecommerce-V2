@extends('components.app')
@section('title', 'Patakah | About Us')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')


<!-- About Start -->
<div class="container-xxl ">
    <div class="container ">
        <div class="row g-5">
            <div class="col-sm-12">
                <div class="title text-center">
                    <h3>Content</h3>
                </div>
            </div> 
        </div>
        <div class="row g-5" id="termsAndCondition">
            <div class="col-sm-12 py-5">
                <div class="title"><h4> TERMS USED IN THIS POLICY</h4></div>
                <p style="color:black;">In this Data Privacy and Protection Policy:</p>
                <div class="content">
                    <ol class="liLists py-2">
                        <li>"Cookies” mean small files that are placed on your computer, mobile device or any other device by a website, containing, among other information, the details of your browsing history on that website.</li>
                        <li>"GDPR” means the EU General Data Protection Regulation.</li>
                        <li>"Personal Data” means any information relating to an identified or identifiable natural person.</li>
                        <li>"Policy” means this Data Privacy and Protection Policy.</li>
                        <li>"Service” refers to a service that Patakah provides, for a fee or gratis. You are using our Service when you actively sign up or sign in to get access to any Service provided by us.</li>
                        <li>"we”, “us”, “our”, and “Patakah” refer to Patakah.</li>
                        <li>"Website” refers to Patakah website. You are using our “website” when you are visiting our website</li>
                        <li>"you” refers to you, as a user or subscriber of the services provided by us.</li>
                    </ol>
                </div>
            </div>
        </div> 
        <div class="row g-5" id="contactUs">
            <div class="col-sm-12 py-5">
                <div class="title"><h4> Contact Us</h4></div> 
                <div class="content">
                    <ol class="liLists py-2 noPoints">
                        <li>Patakah is a Product of JSPARK offered to our clients in Customized Mode.</li>
                        <li>Our registered office address is: B-79, First Floor, Sector-63, Noida-201301</li>
                        <li>You can contact us:</li>
                    </ol> 
                    <ol class="liLists py-2">
                        <li>by post: at our registered office address provided above;</li>
                        <li>by email: on support@Patakah.com;</li>
                        <li>by telephone: on the contact number published on our Website from time to time;</li>
                        <li>by Website: by using our website contact form by <a href="http://Patakah.com/contact">Click Here</a></li>
                        <li>Date Created: JAN 01, 2024</li>
                        <li>Last Updated: JAN 01, 2024</li>
                    </ol> 
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
    $(document).ready(function () {
        $("#hero-header").hide();
        $("#faqRead").hide();
        $("#about-hero").hide();
        $("#accorOne").hide();
        $("#accorTwo").hide(); 
        $("#privacy-hero").hide();
        $("#terms-hero").show();
    })
</script>
@endsection