<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $__env->yieldContent('title', 'succu'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', ''); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', ''); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/normalize.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/icomoon/icomoon.css')); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/vendor.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="<?php echo e(asset('assets/frontend/js/modernizr.js')); ?>"></script>
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
                <p>Let's talk! <strong>+57 444 11 00 35</strong>
                </p>
              </div>
              <div class="col-md-4 shipping-purchase text-center">
                <p>Free shipping on a purchase value of $200</p>
              </div>
              <div class="col-md-4 col-sm-12 user-items">
                <ul class="d-flex justify-content-end list-unstyled align-items-center">
                  <li>
                    <?php if(auth()->user()): ?> 
                      <form method="POST" action="<?php echo e(route('logout')); ?>">
                          <?php echo csrf_field(); ?> 
                          <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.35 6.35" id="Logout"><path fill-rule="evenodd" d="M7.953.998a3.024 3.024 0 0 0-3.006 3.004V20a3.024 3.024 0 0 0 3.006 3.004h3.994A3.022 3.022 0 0 0 14.951 20v-4.002c0-1.334-2-1.334-2 0V20a.983.983 0 0 1-1.004 1.004H7.953A.983.983 0 0 1 6.95 20V4.002a.983.983 0 0 1 1.004-1.004h3.994a.983.983 0 0 1 1.004 1.004v4.002c0 1.334 2 1.334 2 0V4.002A3.022 3.022 0 0 0 11.947.998H7.953zM1.957 4.984a1 1 0 0 0-1.01 1.02v11.994a1 1 0 0 0 2 0V6.004a1 1 0 0 0-.982-1.02 1 1 0 0 0-.008 0zm16.037 2.004a1 1 0 0 0-.096.004 1 1 0 0 0-.6 1.713L19.595 11h-9.588a1.006 1.006 0 0 0-.104 0c-1.333.07-1.23 2.071.104 2.002h9.582l-2.29 2.287a1 1 0 1 0 1.411 1.418l4.002-4.002a1 1 0 0 0 0-1.41l-4.002-4a1 1 0 0 0-.715-.307z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" paint-order="stroke fill markers" transform="scale(.26458)" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;text-orientation:mixed;shape-padding:0;isolation:auto;mix-blend-mode:normal" fill="#8d8d8d" class="color000000 svgShape"></path></svg>
                          </a>
                      </form>        
                  
                  <?php endif; ?>

                  <li>
                      <?php if(auth()->user()): ?> 
                          <a href="<?php echo e(route('profile.edit')); ?>">
                              <i class="icon icon-user"></i>
                          </a>
                      <?php else: ?>
                          <a href="<?php echo e(route('login')); ?>">
                              <i class="icon icon-user"></i>
                          </a>
                      <?php endif; ?>
                  </li>
                  <li>
                    <a href="cart.html">
                      <i class="icon icon-shopping-cart"></i>
                    </a>
                  </li>
                  <li>
                    <a href="wishlist.html">
                      <i class="icon icon-heart"></i>
                    </a>
                  </li>
                  <li class="user-items search-item pe-3">
                    <a href="#" class="search-button">
                      <i class="icon icon-search"></i>
                    </a>
                  </li>
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
                    <img src="<?php echo e(asset('assets/frontend/images/main-logo.png')); ?>" alt="logo">
                  </a>
                </div>
              </div>
              <div class="col-lg-10 col-md-10">
                <div class="navbar">

                  <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                    <ul class="menu-list">

                      <li class="menu-item has-sub">
                        <a href="/" class="item-anchor active d-flex align-item-center" data-effect="Home">Home<i class="icon icon-chevron-down"></i></a>
                        <ul class="submenu">
                          <li><a href="/" class="item-anchor active">Home</a></li>
                        </ul>
                      </li>

                      <li><a href="about.html" class="item-anchor" data-effect="About">About</a></li>

                      <li class="menu-item has-sub">
                        <a href="shop.html" class="item-anchor d-flex align-item-center" data-effect="Shop">Shop<i class="icon icon-chevron-down"></i></a>
                        <ul class="submenu">
                          <li><a href="shop.html" class="item-anchor">Shop</a></li>
                          <li><a href="shop-slider.html" class="item-anchor">Shop slider<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="shop-grid.html" class="item-anchor">Shop grid<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="shop-list.html" class="item-anchor">Shop list<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="single-product.html" class="item-anchor">Single product<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="cart.html" class="item-anchor">Cart<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="wishlist.html" class="item-anchor">Wishlist<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="checkout.html" class="item-anchor">Checkout<span class="text-primary"> (PRO)</span></a></li>
                        </ul>
                      </li>

                      <li class="menu-item has-sub">
                        <a href="#" class="item-anchor d-flex align-item-center" data-effect="Pages">Pages<i class="icon icon-chevron-down"></i></a>
                        <ul class="submenu">
                          <li><a href="coming-soon.html" class="item-anchor">Coming soon<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="login.html" class="item-anchor">Login<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="faqs.html" class="item-anchor">FAQs<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="styles.html" class="item-anchor">Styles</a></li>
                          <li><a href="thank-you.html" class="item-anchor">Thankyou</a></li>
                          <li><a href="error.html" class="item-anchor">Error page<span class="text-primary"> (PRO)</span></a></li>
                        </ul>
                      </li>

                      <li class="menu-item has-sub">
                        <a href="blog.html" class="item-anchor d-flex align-item-center" data-effect="Blog">Blog<i class="icon icon-chevron-down"></i></a>
                        <ul class="submenu">
                          <li><a href="blog.html" class="item-anchor">Blog</a></li>
                          <li><a href="blog-sidebar.html" class="item-anchor">Blog with sidebar<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="blog-masonry.html" class="item-anchor">Blog masonry<span class="text-primary"> (PRO)</span></a></li>
                          <li><a href="single-post.html" class="item-anchor">Single post</a></li>
                        </ul>
                      </li>

                      <li><a href="contact.html" class="item-anchor" data-effect="Contact">Contact</a></li>

                    </ul>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    

    <footer id="footer">
      <div class="container">
        <div class="footer-menu-list">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Ultras</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item">
                    <a href="about.html">About us</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Conditions </a>
                  </li>
                  <li class="menu-item">
                    <a href="blog.html">Our Journals</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Careers</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Affiliate Programme</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Ultras Press</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Customer Service</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item">
                    <a href="faqs.html">FAQ</a>
                  </li>
                  <li class="menu-item">
                    <a href="contact.html">Contact</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Privacy Policy</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Returns & Refunds</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Cookie Guidelines</a>
                  </li>
                  <li class="menu-item">
                    <a href="#">Delivery Information</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Contact Us</h5>
                <p>Do you have any questions or suggestions? <a href="#" class="email">ourservices@ultras.com</a>
                </p>
                <p>Do you need assistance? Give us a call. <br>
                  <strong>+57 444 11 00 35</strong>
                </p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer-menu">
                <h5 class="widget-title">Forever 2018</h5>
                <p>Cras mattis sit ornare in metus eu amet adipiscing enim. Ullamcorper in orci, ultrices integer eget arcu. Consectetur leo dignissim lacus, lacus sagittis dictumst.</p>
                <div class="social-links">
                  <ul class="d-flex list-unstyled">
                    <li>
                      <a href="#">
                        <i class="icon icon-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon icon-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon icon-youtube-play"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="icon icon-behance-square"></i>
                      </a>
                    </li>
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
            <p>Freebies by <a href="https://templatesjungle.com/">Templates Jungle</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </p>
          </div>
          <div class="payment-method">
            <p>Payment options :</p>
            <div class="card-wrap">
              <img src="<?php echo e(asset('assets/frontend/images/visa-icon.jpg')); ?>" alt="visa">
              <img src="<?php echo e(asset('assets/frontend/images/mastercard.png')); ?>" alt="mastercard">
              <img src="<?php echo e(asset('assets/frontend/images/american-express.jpg')); ?>" alt="american-express">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo e(asset('assets/frontend/js/jquery-1.11.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/script.js')); ?>"></script>
  </body>
</html><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/components/app.blade.php ENDPATH**/ ?>