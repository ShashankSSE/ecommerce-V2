<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Category</h4> 
                <form class="forms-sample" id="updateCategoryForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="categoryname">Name</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?php echo e($category->name); ?>" placeholder="Enter Category Name ...">
                        <input type="hidden" class="form-control" id="categoryId" name="categoryId" value="<?php echo e($category->id); ?>">
                    </div>
                    <div class="form-group">
                        <label for="pageTitle">Slug</label>
                        <input type="text" class="form-control" id="categorySlug" name="categorySlug" value="<?php echo e($category->slug); ?>" oninput="validateSlug(this)" placeholder="Enter Page Title ...">
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
        $('#updateCategoryForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var categoryName = $('#categoryname').val();
            if (!categoryName) {
                $("#error").html("Category name is required.");
                $("#categoryname").focus();
                $("#error").show();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '<?php echo e(route("category.update")); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#updateCategoryForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Category has been Updated successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo e(route('category.index')); ?>";
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                $("#error").show();
                $("#error").html("Slug is already exists.");
                },
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>