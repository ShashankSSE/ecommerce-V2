@extends('components.app')
@section('title', 'Patakah | Contact Us')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
 <style>
    .form-control {
        background-color: #f1f1f1!important;
    }
 </style>
<section class="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="contact_inner">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="contact_form_inner">
                                <div class="contact_field">
                                    <h3>Contatc Us</h3>
                                    <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                    <div style="color:red" id="error"></div>
                                    <form id="contactForm">
                                        @csrf
                                        <input type="text" class="form-control form-group" placeholder="Name" name="contact_name" id="contact_name" />
                                        <input type="text" class="form-control form-group" placeholder="Email" name="contact_email" id="contact_email" />
                                        <input type="text" class="form-control form-group" placeholder="Subject" name="contact_subject" id="contact_subject" />
                                        <textarea class="form-control form-group" placeholder="Message" name="contact_message" id="contact_message"></textarea>
                                        <button class="contact_form_submit" type="submit">Send</button>
                                        <div style="color:green;display: flex;align-items: center;justify-content: center;margin-top: 50px;" id="success"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="right_conatct_social_icon d-flex align-items-end">
                                <div class="socil_item_inner d-flex">
                                    <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact_info_sec">
                        <h4>Contact Info</h4>
                        <div class="d-flex info_single align-items-center">
                            <i class="fas fa-headset"></i>
                            <span>+91 9811390208</span>
                        </div>
                        <div class="d-flex info_single align-items-center">
                            <i class="fas fa-envelope-open-text"></i>
                            <span>business@Patakah.com</span>
                        </div>
                        <div class="d-flex info_single align-items-center">
                            <i class="fas fa-map-marked-alt"></i>
                            <span>B-79, First Floor, Sector-63, Noida-201301</span>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  
<script>
    $(document).ready(function(){
        $("#hero-header").hide(); 
        $("#contact-hero").show();

        $('#contactForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var name = $('#contact_name').val();
            var email = $('#contact_email').val();
            var subject = $('#contact_subject').val();
            var message = $('#contact_message').val();
            if (!name || !email || !subject || !message) {
                $("#error").html("Please fill the empty fields.");
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '/submit-form',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        $("#success").html(response.message);
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    }) 
</script>
@endsection