<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    
<?php endif; ?>
    <table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Sub-Category</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> 
                    <td><?php echo e($subCategory->title); ?></td>
                    <td><?php echo e($subCategory->category->name); ?></td>
                    <td><?php echo e($subCategory->slug); ?></td>
                    <td>
                        <?php if($subCategory->is_active): ?>
                        <a href="#" onclick="subCategoryStatusUpdate(<?php echo e($subCategory->id); ?>)">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        <?php else: ?>
                        <a href="#" onclick="subCategoryStatusUpdate(<?php echo e($subCategory->id); ?>)">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($subCategory->created_at); ?></td>
                    <td><?php echo e($subCategory->created_by); ?></td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('sub-category.edit',['id' => $subCategory->id])); ?>">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation(<?php echo e($subCategory->id); ?>)">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>


    function showDeleteConfirmation(categoryId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this subCategory?</h2></div>",
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                popup: 'my-popup'
            },
            icon: "question",
            didOpen: (popup) => {
                popup.querySelector('.swal2-confirm').addEventListener('click', function() {
                    // Perform the delete action here, e.g., via AJAX
                    subCategoryDestroy(categoryId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function subCategoryStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('sub-category.status.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Category has been Updated successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
        function subCategoryDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('sub-category.destroy', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Category has been Deleted successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }else{
                        alert("Something went wrong!");
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/sub-category/index.blade.php ENDPATH**/ ?>