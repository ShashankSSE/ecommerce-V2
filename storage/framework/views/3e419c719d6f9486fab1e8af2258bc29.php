<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    
<?php endif; ?>
<table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Category</th>
                <th>sub Category</th>
                <th>Is Featured?</th>
                <th>Is Flash Sale?</th>
                <th>Is Active?</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> 
                    <td><?php echo e($product->name); ?></td>
                    <td><img src="<?php echo e(asset('images/products/' . $product->featured_img)); ?>" style="    width: 100px;"></td>
                    <td><?php echo e($product->category); ?></td>
                    <td><?php echo e($product->subcategory); ?></td>
                    <td >
                        <?php if($product->is_featured): ?>
                        <a href="#" onclick="productFeaturedStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        <?php else: ?>
                        <a href="#" onclick="productFeaturedStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td >
                        <?php if($product->is_flash_sale): ?>
                        <a href="#" onclick="productFlashSaleStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        <?php else: ?>
                        <a href="#" onclick="productFlashSaleStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td >
                        <?php if($product->is_active): ?>
                        <a href="#" onclick="productStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        <?php else: ?>
                        <a href="#" onclick="productStatusUpdate(<?php echo e($product->id); ?>)">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($product->created_at); ?></td>
                    <td><?php echo e($product->created_by); ?></td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('product.edit',['id' => $product->id])); ?>">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation(<?php echo e($product->id); ?>)">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($products->links()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function showDeleteConfirmation(productId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this product?</h2></div>",
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
                    productDestroy(productId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
    function productStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('product.status.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "product has been Updated successfully!",
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
        function productFlashSaleStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('product.flashSale.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "product has been Updated successfully!",
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
        }function productFeaturedStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('product.featured.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "product has been Updated successfully!",
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
        function productDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('product.destroy', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "product has been Deleted successfully!",
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/product/index.blade.php ENDPATH**/ ?>