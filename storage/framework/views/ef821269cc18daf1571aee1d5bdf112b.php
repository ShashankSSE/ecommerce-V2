<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    
<?php endif; ?>
<style>
    .addMoreUsers{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
</style>
<div class="addMoreUsers">
    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-sm">Add +</a>
</div>
<table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Created On</th>
                <!-- <th>Created By</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> 
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td >
                        <?php if($user->is_admin): ?>
                            <center>Admin</center>
                        <?php else: ?>
                            <center>Normal User</center>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($user->created_at); ?></td>
                    <!-- <td><?php echo e($user->created_by); ?></td> -->
                    <td>
                        <div class="actions">
                            <a href="<?php echo e(route('user.edit',['id' => $user->id])); ?>">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a> 
                            <?php if(!$user->is_admin): ?>                            
                                <a href="#" onclick="showDeleteConfirmation(<?php echo e($user->id); ?>)">
                                    <div id="inactive"><i class="mdi mdi-delete"></i></div>
                                </a>
                            <?php endif; ?>                            
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    function showDeleteConfirmation(userId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this user?</h2></div>",
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
                    userDestroy(userId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function userStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('user.status.update', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "User has been Updated successfully!",
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
        function userDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "<?php echo e(route('user.destroy', ['id' => ':id'])); ?>".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "user has been Deleted successfully!",
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/users/index.blade.php ENDPATH**/ ?>