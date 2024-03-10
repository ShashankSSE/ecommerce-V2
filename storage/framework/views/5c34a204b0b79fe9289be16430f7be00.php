<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Sub Category</h4>
                <p class="card-description">
                    From here you can add new categories once at a time.
                </p>
                <form class="forms-sample" id="categoryForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="subCategoryName">Name</label>
                        <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" placeholder="Enter Sub Category Name ...">
                    </div>
                    <div class="form-group">
                        <label for="categoryId">Name</label>
                        <select type="text" class="form-control js-example-basic-single" id="categoryId" name="categoryId" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <select>
                    </div>
                    <div style="color:red; padding-bottom:10px;" id="error"></div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){

    $('.js-example-basic-single').select2(); 
        $('#categoryForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var categoryName = $('#subCategoryName').val();
            if (!categoryName) {
                $("#error").html("Sub Category name is required.");
                $("#subCategoryName").focus();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '<?php echo e(route("sub-category.store")); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#categoryForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Sub Category has been added successfull!",
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
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/sub-category/create.blade.php ENDPATH**/ ?>