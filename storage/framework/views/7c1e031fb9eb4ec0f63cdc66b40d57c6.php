
        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3 text-center">
                        <h5 class="text-white mb-4" style="background:white; border-radius:10px;"><img class="img-fluid" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Image"></h5>
                        <div class="row g-2"> 
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>B-79, First Floor, Sector-63, Noida-201301</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+91 9811390208</p>
                        <p><i class="fa fa-envelope me-3"></i>business@99mentor.com</p>
                        <div class="d-flex pt-2">
                            <!-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a> -->
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/company/99mentorr/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Popular Link</h5>
                        <a class="btn btn-link" href="/about">About Us</a>
                        <a class="btn btn-link" href="/contact">Contact Us</a>
                        <a class="btn btn-link" href="/privacy-policy">Privacy Policy</a>
                        <a class="btn btn-link" href="/terms-and-condition">Terms & Condition</a>
                        <!-- <a class="btn btn-link" href="">Career</a> -->
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Interested ? Shere your email to get in touch with us.</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">99mentor</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							2024 
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="/">Home</a>
                                <a href="/terms-and-condition">Terms & Condition</a>
                                <a href="/privacy-policy">Privacy Policy</a>
                                <a href="/about#faq">FQAs</a>
                                <?php if(Route::has('login')): ?>
                                    <?php if(auth()->guard()->check()): ?>
                                        <?php if(auth()->user()->is_admin): ?>
                                            <a href="<?php echo e(url('/dashboard')); ?>" >Admin Dashboard</a>
                                        <?php else: ?>
                                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                                <?php echo csrf_field(); ?> 
                                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); this.closest('form').submit();" >Log Out</a>
                                            </form>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">Admin Login</a>
                                    <?php endif; ?>                                
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End --><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/components/footer.blade.php ENDPATH**/ ?>