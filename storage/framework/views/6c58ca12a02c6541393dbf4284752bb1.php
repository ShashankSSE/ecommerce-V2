<?php $__env->startSection('title', 'succu | Create new account'); ?>
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
        margin-bottom: 100px!important;
    }
    .errors{
        padding: 10px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="login-container">
                <form class="login-form" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <h2>Create new account</h2>
                    <p><a href="<?php echo e(route('login')); ?>">Already have an account, login here</a></p>
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Full name" required autofocus autocomplete="name">                                        
                    </div>
                    <div class="input-group">
                        <input type="text" id="email" name="email" placeholder="Email" required autofocus autocomplete="email">                    
                    </div>
                    <div class="input-group">
                        <input type="text" id="password" name="password" placeholder="Password" required autofocus autocomplete="new-password">                    
                    </div>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required >                    
                    </div>
                    <div class="errors">
                        <p style="color:red;">
                            <?php if($errors->has('name')): ?>
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                        <p style="color:red;">
                            <?php if($errors->has('email')): ?>
                                <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                        <p style="color:red;">
                            <?php if($errors->has('password')): ?>
                                <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                        <p style="color:red;">
                            <?php if($errors->has('password_confirmation')): ?>
                                <?php $__currentLoopData = $errors->get('password_confirmation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                    <button type="submit" ><?php echo e(__('Register Yourself')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/pages/register.blade.php ENDPATH**/ ?>