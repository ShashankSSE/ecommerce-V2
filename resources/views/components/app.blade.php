<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Patakha')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/icomoon/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('assets/frontend/js/modernizr.js')}}"></script>
    <style>
      a svg{
        width: 20px;
      }
      a i{
        font-size: 20px!important;
      }
      li form {
        margin-bottom: 0rem!important;
      }
      #cartNo{
        background: #ff000075;
        color: black;
        font-weight: 600;
        border-radius: 50%;
        width: 25px;
        display: flex;
        height: 25px;
        align-items: center;
        justify-content: center;
        font-size: 12px;
      }
    </style>
  </head>
  <body>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="search-popup">
      <div class="search-popup-container">

        <form role="search" method="get" class="search-form" action="">
          <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
          <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
        </form>

        <h5 class="cat-list-title">Browse Categories</h5>
        
        <ul class="cat-list">
          <li class="cat-list-item">
            <a href="shop.html" title="Men Jackets">Men Jackets</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Fashion">Fashion</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Casual Wears">Casual Wears</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Women">Women</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Trending">Trending</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Hoodie">Hoodie</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Kids">Kids</a>
          </li>
        </ul>
      </div>
    </div>
    <header id="header">
      <div id="header-wrap">
        <nav class="secondary-nav border-bottom">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-md-4 header-contact">
                @if($settings)
                  <p>Let's talk! <strong>+91 {{$settings->mobile}}</strong>
                @endif
                </p>
              </div>
              <div class="col-md-4 shipping-purchase text-center">
                <!-- <p>Free shipping on a purchase value of $200</p> -->
              </div>
              <div class="col-md-4 col-sm-12 user-items">
                <ul class="d-flex justify-content-end list-unstyled align-items-center">
                  <li>
                    @if(auth()->user()) 
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf 
                          <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.35 6.35" id="Logout"><path fill-rule="evenodd" d="M7.953.998a3.024 3.024 0 0 0-3.006 3.004V20a3.024 3.024 0 0 0 3.006 3.004h3.994A3.022 3.022 0 0 0 14.951 20v-4.002c0-1.334-2-1.334-2 0V20a.983.983 0 0 1-1.004 1.004H7.953A.983.983 0 0 1 6.95 20V4.002a.983.983 0 0 1 1.004-1.004h3.994a.983.983 0 0 1 1.004 1.004v4.002c0 1.334 2 1.334 2 0V4.002A3.022 3.022 0 0 0 11.947.998H7.953zM1.957 4.984a1 1 0 0 0-1.01 1.02v11.994a1 1 0 0 0 2 0V6.004a1 1 0 0 0-.982-1.02 1 1 0 0 0-.008 0zm16.037 2.004a1 1 0 0 0-.096.004 1 1 0 0 0-.6 1.713L19.595 11h-9.588a1.006 1.006 0 0 0-.104 0c-1.333.07-1.23 2.071.104 2.002h9.582l-2.29 2.287a1 1 0 1 0 1.411 1.418l4.002-4.002a1 1 0 0 0 0-1.41l-4.002-4a1 1 0 0 0-.715-.307z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" paint-order="stroke fill markers" transform="scale(.26458)" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;text-orientation:mixed;shape-padding:0;isolation:auto;mix-blend-mode:normal" fill="#8d8d8d" class="color000000 svgShape"></path></svg>
                          </a>
                      </form>        
                  
                  @endif

                  <li>
                      @if(auth()->user()) 
                          <a href="{{ route('profile.edit') }}">
                              <i class="icon icon-user"></i>
                          </a>
                      @else
                          <a href="{{ route('login') }}">
                              <i class="icon icon-user"></i>
                          </a>
                      @endif
                  </li>
                  <li>
                    <a href="{{route('cart.index')}}" style="display: flex;gap: 5px;align-items: center;">
                      <i class="icon icon-shopping-cart"></i>
                      @if(auth()->user())
                        <span id="cartNo">{{$totalProductInCart}}</span>
                      @endif
                    </a>
                  </li>
                  <!-- <li>
                    <a href="wishlist.html">
                      <i class="icon icon-heart"></i>
                    </a>
                  </li>
                  <li class="user-items search-item pe-3">
                    <a href="#" class="search-button">
                      <i class="icon icon-search"></i>
                    </a>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <nav class="primary-nav padding-small">
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-lg-2 col-md-2">
                <div class="main-logo">
                  <a href="/">
                    @if($settings)
                      <img src="{{asset('images/site/' . $settings->header_logo)}}" alt="logo">
                    @else
                      <h2>Patakha</h2>
                    @endif
                  </a>
                </div>
              </div>
              <div class="col-lg-10 col-md-10">
                <div class="navbar">

                  <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                    <ul class="menu-list">

                      <li><a href="/" class="item-anchor active">Home</a></li>

                      <li class="menu-item has-sub">
                        <a href="" class="item-anchor d-flex align-item-center" data-effect="Shop">Shop<i class="icon icon-chevron-down"></i></a>
                        <ul class="submenu">
                          <!-- <li><a href="shop.html" class="item-anchor">Shop</a></li> -->
                          @foreach($categories as $category)
                          <li class="menu-item has-sub">
                            <a href="{{ route('frontend.category.index', ['slug' => $category->slug]) }}" class="item-anchor d-flex align-item-center justify-content-between">{{$category->name}} {!!count($category->subcategories) > 0 ? '<i class="icon icon-chevron-right"></i>' : ''!!}</a>
                            @if(count($category->subcategories) > 0)
                            <ul class="submenu">
                              @foreach($category->subcategories as $subcategory)
                              @if($subcategory->slug)
                              <li>
                                  <a href="{{ route('frontend.subcategory.index', ['slug' => $subcategory->slug]) }}" class="item-anchor">
                                      {{ $subcategory->title }} 
                                  </a>
                                </li>
                              @endif
                              @endforeach
                            </ul>
                            @endif
                          </li>                            
                          @endforeach
                          

                        </ul>
                      </li>
                      <li><a href="/about-us" class="item-anchor" data-effect="Contact">About Us</a></li>
                      <li><a href="/contact-us" class="item-anchor" data-effect="Contact">Contact</a></li>

                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    @yield('content')
    

    <footer id="footer">
      <div class="container">
        <div class="footer-menu-list">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Patakha</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item">
                    <a href="/about-us">About us</a>
                  </li>  
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Customer Service</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item">
                    <a href="/faq">FAQ</a>
                  </li>
                  <li class="menu-item">
                    <a href="/contact-us">Contact</a>
                  </li>
                  @if($footerLinks)
                    @foreach($footerLinks as $link)
                      <li class="menu-item">
                        <a href="/pages/{{$link->slug}}">{{$link->title}}</a>
                      </li> 
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Contact Us</h5>
                <p>Do you have any questions or suggestions? {!! $settings ? '<a href="mailto:' . $settings->email . '" class="email">' . $settings->email . '</a>' : '' !!}
                </p>
                <p>Do you need assistance? Give us a call. <br>
                {!! $settings? '<a href="tel:' . $settings->mobile . '" class="email">+91-' . $settings->mobile . '</a>' : '' !!}
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">About Us</h5>
                <p>{{ $settings ? $settings->short_description : ''}}</p>
                <div class="social-links">
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
          </div>
        </div>
      </div>
      <hr>
    </footer>
    <div id="footer-bottom">
      <div class="container">
        <div class="d-flex align-items-center flex-wrap justify-content-between">
          <div class="copyright">
            @if($settings)
              <p>{!!$settings->credits!!}</a>
            @endif
            </p>
          </div>
          <div class="payment-method">
            <p>Payment options :</p>
            <div class="card-wrap">
              <img src="{{asset('assets/frontend/images/visa-icon.jpg')}}" alt="visa">
              <img src="{{asset('assets/frontend/images/mastercard.png')}}" alt="mastercard">
              <img src="{{asset('assets/frontend/images/american-express.jpg')}}" alt="american-express">
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function addToCart(id){

        var mrp = $('#mrp').text(); // Assuming the price is in a text format
        var price = $('#price').text(); // Assuming the price is in a text format 
        var size = $('#selected_size').text();
        var color = $('#selected_color').text();
        console.log(color);
        var image = $('#imageUrl').attr('src'); 
        if(color == ''){
          Swal.fire({
              icon: 'error',
              title: 'Information...',
              text: 'You have not selected the color.'
          });
          return false;
        }
        $.ajax({
            url: "{{route('cart.addToCart', ['id' => ':id'])}}".replace(':id', id),
            type: 'GET', // HTTP method
            data: {
                price: price,
                mrp: mrp ,
                size: size ,
                color: color ,
                image: image , 
            },
            success: function(response) {
                // Handle the success response
                Swal.fire({
                      icon: 'success',
                      title: 'Congratulations...',
                      text: 'You have successfully added the product to your cart.'
                  }).then(() => {
                      // Redirect to the login page if necessary
                      window.location.href = "{{ route('index') }}";
                  });
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('Error:', error);
                // Check if the error is due to not being logged in (status code 401)
                if (xhr.status == 401) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: xhr.responseJSON.error
                  }).then(() => {
                      // Redirect to the login page if necessary
                      window.location.href = "{{ route('login') }}";
                  });
                }
                if (xhr.status == 409) {
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: xhr.responseJSON.error
                  });
                }
            }
        });
      }
 </script>
    <script src="{{asset('assets/frontend/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('assets/frontend/js/script.js')}}"></script>

  </body>
</html>