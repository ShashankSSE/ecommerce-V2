<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Sub Category</h4> 
                <form class="forms-sample" id="updateSubCategoryForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="subCategoryName">Name</label>
                        <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" value="<?php echo e($subCategory->title); ?>" placeholder="Enter Sub Category Name ..." required>
                        <input type="hidden" class="form-control" id="subCategoryId" name="subCategoryId" value="<?php echo e($subCategory->id); ?>">
                    </div>
                    <div class="form-group">
                        <label for="pageTitle">Slug</label>
                        <input type="text" class="form-control" id="subCategorySlug" name="subCategorySlug" value="<?php echo e($subCategory->slug); ?>" oninput="validateSlug(this)" placeholder="Enter slug ..." required>
                    </div>            
                    <div class="form-group">
                        <label for="categoryId">Name</label>
                        <select type="text" class="form-control js-example-basic-single" id="categoryId" name="categoryId" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($subCategory->category_id == $category->id ? "selected" : ""); ?>><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <select>
                    </div>
                    <div style="color:red; padding-bottom:10px;" id="error"></div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){
        $('#updateSubCategoryForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var categoryName = $('#subCategoryName').val();
            if (!categoryName) {
                $("#error").html("Sub Category name is required.");
                $("#subCategoryName").focus();
                $("#error").show();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '<?php echo e(route("sub-category.update")); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#updateSubCategoryForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Sub Category has been Updated successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo e(route('sub-category.index')); ?>";
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                    $("#error").show();
                    $("#error").html("Slug is already exists.");
                },
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/sub-category/edit.blade.php ENDPATH**/ ?>