<?php $__env->startSection('content'); ?>
<style>
  .statistics-details a{
    width: 100%;
    text-decoration: none;
    transition: transform 0.3s ease; /* Add smooth transition effect */
  }
  .statistics-details a:hover{
    transform: translateY(-5px);
  }
  .statistics-details .card-view{
    background: #e8f0ff !important;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 25px;
    padding-bottom: 25px;
    border-radius: 5px;
    box-shadow: 4px 5px 7px 0px #ccc;
  }
  .home-tab .statistics-details .statistics-title {
    font-style: normal;
    font-weight: 600!important;
    font-size: 14px!important;
    line-height: 18px;
    color: #000000!important;
    margin-bottom: 4px;
}
  .home-tab .statistics-details{
    gap:20px;
  }
</style>
<div class="row">
  <div class="col-sm-12">
    <div class="home-tab"> 
      <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
          <div class="row">
            <div class="col-sm-12">
              <div class="statistics-details d-flex align-items-center justify-content-between">
                <a href="<?php echo e(route('product.index')); ?>">
                  <div class="card-view">
                    <p class="statistics-title">Total Products</p>
                    <h3 class="rate-percentage"><?php echo e(count($products)); ?></h3>                  
                  </div>
                </a>
                <a href="<?php echo e(route('category.index')); ?>">
                  <div class="card-view">
                    <p class="statistics-title">Total Categories</p>
                    <h3 class="rate-percentage"><?php echo e(count($categories)); ?></h3>                  
                  </div>
                </a>
                <a href="<?php echo e(route('sub-category.index')); ?>">
                  <div class="card-view">
                    <p class="statistics-title">Total Sub Categories</p>
                    <h3 class="rate-percentage"><?php echo e(count($subCategories)); ?></h3>                  
                  </div>
                </a>
                <a href="<?php echo e(route('user.index')); ?>">
                  <div class="card-view">
                    <p class="statistics-title">Total Users</p>
                    <h3 class="rate-percentage"><?php echo e(count($users)); ?></h3>                  
                  </div>
                </a>
                <a href="#">
                  <div class="card-view">
                    <p class="statistics-title">Total Revenue (inr)</p>
                    <h3 class="rate-percentage">0</h3>                  
                  </div> 
                </a>
              </div>
            </div>
          </div> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>