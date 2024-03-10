<?php $__env->startSection('title', 'succu | Login'); ?>
<?php $__env->startSection('meta_description', ''); ?>
<?php $__env->startSection('meta_keywords',''); ?>
<?php $__env->startSection('content'); ?>
<style>
    .login-form{
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #dfdbdb2e;
        border-radius: 10px;
        box-shadow: 1px 2px 13px #ccc;
        margin: 50px;
        margin-bottom: 100px;
    }
    .text-red{
        color: red;
        font-weight: 600;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div class="login-container">
            <form class="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <h2>Login</h2>
                <p><a href="<?php echo e(route('register')); ?>">Create new account</a></p>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Username" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username">                    
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="current-password" >
                </div>
                <?php if($errors->has('email')): ?>
                    <div class="mt-2 text-red">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <?php if($errors->has('password')): ?>
                    <div class="mt-2 text-red">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <button type="submit" ><?php echo e(__('Log in')); ?></button>
                <?php if(Route::has('password.request')): ?>
                    <div class="bottom-text">
                        <!-- <p>Don't have an account? <a href="#">Sign Up</a></p> -->
                        <p><a href="<?php echo e(route('password.request')); ?>">Forgot password?</a></p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        </div>
    </div>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/pages/login.blade.php ENDPATH**/ ?>