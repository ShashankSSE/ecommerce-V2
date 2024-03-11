<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    
<?php endif; ?>
<style>
    .addMorePages{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
</style>
<div class="addMorePages">
    <a href="<?php echo e(route('faq.create')); ?>" class="btn btn-primary btn-sm">Add +</a>
</div>
<table id="example"  class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Question</th>
                <th>Answere</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> 
                    <td><?php echo e($faq->question); ?></td>
                    <td><?php echo $faq->answere; ?></td>
                    <td >
                        <?php if($faq->is_active): ?>
                        <a href="#" onclick="faqStatusUpdate(<?php echo e($faq->id); ?>)">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        <?php else: ?>
                        <a href="#" onclick="faqStatusUpdate(<?php echo e($faq->id); ?>)">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($faq->created_at); ?></td>
                    <td><?php echo e($faq->created_by); ?></td>
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('faq.edit',['id' => $faq->id])); ?>">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation(<?php echo e($faq->id); ?>)">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($faqs->links()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function showDeleteConfirmation(categoryId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this category?</h2></div>",
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
                    faqDestroy(categoryId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function faqStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('faq.status.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "FAQ has been Updated successfully!",
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
        function faqDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('faq.destroy', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Faq has been Deleted successfully!",
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/faq/index.blade.php ENDPATH**/ ?>