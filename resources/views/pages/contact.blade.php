@extends('components.app')
@section('title', 'Patakha | Contact Us')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')


<section class="contact-information padding-large">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="section-header">
              <h2 class="section-title">Get in touch</h2>
            </div>
            <div class="contact-detail">
              <div class="detail-list">
                <p>{{ $settings ? $settings->short_description : ''}}</p>
                <ul class="list-unstyled list-icon">
                  <li>
                  {!! $settings? '<a href="tel:' . $settings->mobile . '" class="email">+91-' . $settings->mobile . '</a>' : '' !!}
                  </li>
                  <li>
                  {!! $settings ? '<a href="mailto:' . $settings->email . '" class="email">' . $settings->email . '</a>' : '' !!}
                  </li> 
                </ul>
              </div>
              <div class="social-links">
                <h3>Social Links</h3>
                <ul class="d-flex list-unstyled">
                @if($settings)
                      @foreach(json_decode($settings->social_media) as $social=>$url)
                        @if($social == 'Facebook')
                          <li>
                            <a href="{{$url}}">
                              <i class="icon icon-facebook"></i>
                            </a>
                          </li>
                          @elseif($social == 'Youtube')
                            <li>
                              <a href="{{$url}}">
                                <i class="icon icon-youtube-play"></i>
                              </a>
                            </li>
                          @elseif($social == 'Instagram')
                            <li>
                              <a href="{{$url}}">
                                <i class="icon icon-instagram"></i>
                              </a>
                            </li>
                          @elseif($social == 'Whatsapp')                        
                            <li>
                              <a href="{{$url}}">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="512"viewBox="0 0 512 512"><g id="icomoon-ignore"></g><path d="M436.5 74.4c-47.9-48-111.6-74.4-179.5-74.4-139.8 0-253.6 113.8-253.6 253.7 0 44.7 11.7 88.4 33.9 126.8l-36 131.5 134.5-35.3c37.1 20.2 78.8 30.9 121.2 30.9h0.1c0 0 0 0 0 0 139.8 0 253.7-113.8 253.7-253.7 0-67.8-26.4-131.5-74.3-179.5zM257.1 464.8v0c-37.9 0-75-10.2-107.4-29.4l-7.7-4.6-79.8 20.9 21.3-77.8-5-8c-21.2-33.5-32.3-72.3-32.3-112.2 0-116.3 94.6-210.9 211-210.9 56.3 0 109.3 22 149.1 61.8 39.8 39.9 61.7 92.8 61.7 149.2-0.1 116.4-94.7 211-210.9 211zM372.7 306.8c-6.3-3.2-37.5-18.5-43.3-20.6s-10-3.2-14.3 3.2c-4.2 6.3-16.4 20.6-20.1 24.9-3.7 4.2-7.4 4.8-13.7 1.6s-26.8-9.9-51-31.5c-18.8-16.8-31.6-37.6-35.3-43.9s-0.4-9.8 2.8-12.9c2.9-2.8 6.3-7.4 9.5-11.1s4.2-6.3 6.3-10.6c2.1-4.2 1.1-7.9-0.5-11.1s-14.3-34.4-19.5-47.1c-5.1-12.4-10.4-10.7-14.3-10.9-3.7-0.2-7.9-0.2-12.1-0.2s-11.1 1.6-16.9 7.9c-5.8 6.3-22.2 21.7-22.2 52.9s22.7 61.3 25.9 65.6c3.2 4.2 44.7 68.3 108.3 95.7 15.1 6.5 26.9 10.4 36.1 13.4 15.2 4.8 29 4.1 39.9 2.5 12.2-1.8 37.5-15.3 42.8-30.1s5.3-27.5 3.7-30.1c-1.5-2.8-5.7-4.4-12.1-7.6z"></path></svg>
                              </a>
                            </li>
                          @elseif($social == 'Snapchat')     
                            <li>
                              <a href="{{$url}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5.829 4.533c-.6 1.344-.363 3.752-.267 5.436-.648.359-1.48-.271-1.951-.271-.49 0-1.075.322-1.167.802-.066.346.089.85 1.201 1.289.43.17 1.453.37 1.69.928.333.784-1.71 4.403-4.918 4.931-.251.041-.43.265-.416.519.056.975 2.242 1.357 3.211 1.507.099.134.179.7.306 1.131.057.193.204.424.582.424.493 0 1.312-.38 2.738-.144 1.398.233 2.712 2.215 5.235 2.215 2.345 0 3.744-1.991 5.09-2.215.779-.129 1.448-.088 2.196.058.515.101.977.157 1.124-.349.129-.437.208-.992.305-1.123.96-.149 3.156-.53 3.211-1.505.014-.254-.165-.477-.416-.519-3.154-.52-5.259-4.128-4.918-4.931.236-.557 1.252-.755 1.69-.928.814-.321 1.222-.716 1.213-1.173-.011-.585-.715-.934-1.233-.934-.527 0-1.284.624-1.897.286.096-1.698.332-4.095-.267-5.438-1.135-2.543-3.66-3.829-6.184-3.829-2.508 0-5.014 1.268-6.158 3.833z" fill="#020202"/></svg>
                              </a>
                            </li>
                          @elseif($social == 'Twitter')     
                            <li>
                              <a href="{{$url}}">
                                <i class="icon icon-twitter"></i>
                              </a>
                            </li>
                          @else
                        @endif
            
                      @endforeach
                    @endif
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="contact-information">
              <div class="section-header">
                <h2 class="section-title">Send us a message</h2>
              </div>
              <form name="contactform" id="contactform" class="contact-form">
                <div class="form-item">
                  <input type="text" minlength="2" id="name" name="name" placeholder="Name" class="u-full-width bg-light" required>
                  <input type="email" name="email" id="email" placeholder="E-mail" class="u-full-width bg-light" required>
                  <textarea class="u-full-width bg-light" id="message" name="message" placeholder="Message" style="height: 180px;" required></textarea>
                </div>
                <label>
                  <input type="checkbox" required>
                  <span class="label-body">I agree all the <a href="#">terms and conditions</a>
                  </span>
                </label>
                <button type="submit" name="submit" class="btn btn-dark btn-full btn-medium">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="google-map" style="margin-bottom:50px;">
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          <a href="https://getasearch.com/fmovies"></a>
          <br>
          <style>
            .mapouter {
              position: relative;
              text-align: right;
              height: 500px;
              width: 100%;
            }
          </style>
          <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
          <style>
            .gmap_canvas {
              overflow: hidden;
              background: none !important;
              height: 500px;
              width: 100%;
            }
          </style>
        </div>
      </div>
    </section>
  
<script>
    $(document).ready(function(){
        $("#hero-header").hide(); 
        $("#contact-hero").show();

        $('#contactform').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var name = $('#name').val();
            var email = $('#email').val();            
            var message = $('#message').val(); 
            var csrfToken = '{{ csrf_token() }}'; 

            var formData = new FormData($('#contactform')[0]); 
            formData.append('name', name);
            formData.append('email', email);
            formData.append('message', message); 
            formData.append('_token', csrfToken);
            $.ajax({
                url: '{{route("frontend.contact.submit")}}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                // contentType: false,
                // processData: false,
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#contactform')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        })
    }) 
</script>
@endsection