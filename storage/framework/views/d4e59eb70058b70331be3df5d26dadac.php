<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title', '99mentor'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="description" content="<?php echo $__env->yieldContent('meta_description', ''); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', ''); ?>">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('assets/lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
</head>

<body class="bg-white">

<?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('components.items.book-demo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.items.get-broucher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class=" py-2 bg-primary hero-header mb-5" id="services-hero" style="display:block;">
    <div class="my-5  px-lg-5">
        <div class="row g-5 ">
            <div class="col-12 text-center">  
            </div>
        </div>
    </div>
</div>
<div class="container p-0 my-5">
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="login-container">
            <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <h1>Welcome to 99mentor</h1>
                <p>Please login with your admin account</p>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Username" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="current-password" >
                </div>
                <button type="submit" ><?php echo e(__('Log in')); ?></button>
                <?php if(Route::has('password.request')): ?>
                    <div class="bottom-text">
                        <!-- <p>Don't have an account? <a href="#">Sign Up</a></p> -->
                        <p><a href="<?php echo e(route('password.request')); ?>">Forgot password?</a></p>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

<?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('assets/lib/wow/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/lib/easing/easing.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/lib/waypoints/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/lib/isotope/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/lib/lightbox/js/lightbox.min.js')); ?>"></script>  

<!-- Template Javascript -->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>

</html><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/auth/new-login.blade.php ENDPATH**/ ?>