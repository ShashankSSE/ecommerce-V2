<?php $__env->startSection('title', 'succu | Login'); ?>
<?php $__env->startSection('meta_description', ''); ?>
<?php $__env->startSection('meta_keywords',''); ?>
<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
    <div class="alert alert-dismissible alert-success">
        <?php echo e(session('status')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"><i class="fa fa-times"></i></button>
    </div>
<?php endif; ?>
<style>
    .card-img-top {
        width: 50%;
        border-radius: 50%;
        margin: 0 auto;
        text-transform: uppercase;
        background: #6995b1;
        color: white;
        font-size: 100px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    p{
        margin:0px;
    }
    .card-body p{
        font-size: 22px;
        font-weight: 600;
        padding: 10px;
        padding-bottom: 0px;
    }
    .card {
        padding: 1.5em 0.5em 1.5em 0.5em;
        text-align: center;
        border-radius: 2em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
    .card-title {
        font-weight: bold;
        font-size: 1.5em;
    }
    .btn-primary {
        border-radius: 2em;
        padding: 0.5em 1.5em;
    } 
    .mtb{
        margin-top: 50px;
        margin-bottom: 100px;
    }
    input,textarea{
        width: 100%;
        padding:10px;
    }
    .p-15{
        padding: 15px;
    }
    #updateProfileBtn,#changePasswordBtn,#verifyEmailBtn{
        cursor:pointer;
    }
    #updateProfile,#changePassword,#verifyEmail{
        padding:20px;
    }
    .text-red{
        color:red;
    }
</style>
<div class="container">
    <div class="row mtb">
        <div class="col-sm-3">
            <div class="profile-box">
                <div class="card" style="">
                    <div class="card-img-top">
                        <?php echo e($nameTag); ?>

                    </div>
                    <div class="card-body">
                        <p><?php echo e($user->name); ?></p>
                        <p><?php echo e($user->email); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
        <?php if($errors->updatePassword->first('current_password')): ?>
                <div class="text-red"><?php echo e($errors->updatePassword->first('current_password')); ?></div>
            <?php endif; ?>
            <?php if($errors->updatePassword->first('password')): ?>
                <div class="text-red"><?php echo e($errors->updatePassword->first('password')); ?></div>
            <?php endif; ?>
            <?php if($errors->updatePassword->first('password_confirmation')): ?>
                <div class="text-red"><?php echo e($errors->updatePassword->first('password_confirmation')); ?></div>
            <?php endif; ?> 

        <div class="myTabBtns">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="updateProfileBtn">Update Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="changePasswordBtn" >Change Password</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="verifyEmailBtn" >Verify Email</a>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="tab-content">
            <div class=" show" id="updateProfile" role="tabpanel">
                <form method="post" action="<?php echo e(route('profile.update')); ?>" class="mt-6 space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>"/>
                            </div> 
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo e($user->userinfo->first() ? $user->userinfo->first()->mobile : ''); ?>"/>
                            </div> 
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="<?php echo e($user->userinfo->first() ? $user->userinfo->first()->state : ''); ?>"/>
                            </div> 
                        </div>
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo e($user->userinfo->first() ? $user->userinfo->first()->city : ''); ?>"/>
                            </div> 
                            <div class="form-group">
                                <label for="pin">Pin</label>
                                <input type="number" class="form-control" id="pin" name="pin" value="<?php echo e($user->userinfo->first() ? $user->userinfo->first()->pin : ''); ?>"/>
                            </div> 
                        </div>
                        <div class="p-15">
                            <div class="form-group">
                                <label for="address">Full Address</label>                            
                                <textarea class="form-control" id="address" name="address" ><?php echo e($user->userinfo->first() ? $user->userinfo->first()->address : ''); ?></textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary float-right">Update Profile</button>
                        </div>

                    </div>
                </form>
            </div>
            <div class="d-none" id="changePassword" role="tabpanel">
                <form method="post" action="<?php echo e(route('password.update')); ?>" class="mt-6 space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" value=""/>
                            </div> 
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" value=""/>
                            </div> 
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="<?php echo e($user->userinfo->first() ? $user->userinfo->first()->state : ''); ?>"/>
                            </div> 
                        </div> 
                        <div class="p-15">
                            <button type="submit" class="btn btn-primary float-right">Update Profile</button>                                                        
                        </div>

                    </div>
                </form>
            </div>
            <div class="d-none" id="verifyEmail" role="tabpanel">
            <form id="send-verification" method="post" action="<?php echo e(route('verification.send')); ?>">
                <?php echo csrf_field(); ?>
            </form>
                <?php if(!$user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()): ?>
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            <?php echo e(__('Your email address is unverified.')); ?>


                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <?php echo e(__('Click here to re-send the verification email.')); ?>

                            </button>
                        </p>

                        <?php if(session('status') === 'verification-link-sent'): ?>
                            <p class="mt-2 font-medium text-sm text-green-600">
                                <?php echo e(__('A new verification link has been sent to your email address.')); ?>

                            </p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <?php echo e(__('Your email address is verified.')); ?>

                <?php endif; ?>
                
            </div>
        </div>
            
        </div>
    </div>
</div>
 <script>
    $("#updateProfileBtn").on('click',function(){
        $("#changePasswordBtn").removeClass('active');
        $("#changePassword").addClass('d-none');

        $("#updateProfileBtn").addClass('active');
        $("#updateProfile").removeClass('d-none');

        $("#verifyEmailBtn").removeClass('active');
        $("#verifyEmail").addClass('d-none');
    })
    $("#changePasswordBtn").on('click',function(){
        $("#changePasswordBtn").addClass('active');
        $("#changePassword").removeClass('d-none');

        $("#updateProfileBtn").removeClass('active');
        $("#updateProfile").addClass('d-none');

        $("#verifyEmailBtn").removeClass('active');
        $("#verifyEmail").addClass('d-none');
    })

    $("#verifyEmailBtn").on('click',function(){
        $("#changePasswordBtn").removeClass('active');
        $("#changePassword").addClass('d-none');

        $("#updateProfileBtn").removeClass('active');
        $("#updateProfile").addClass('d-none');

        $("#verifyEmailBtn").addClass('active');
        $("#verifyEmail").removeClass('d-none');
    })
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/profile/partials/update-profile-information-form.blade.php ENDPATH**/ ?>