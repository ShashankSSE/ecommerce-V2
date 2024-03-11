<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Attribute Unit</h4>
                <p class="card-description">
                    From here you can add new attribute Unit once at a time.
                </p>
                <form class="forms-sample" id="attributeForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="categoryname">Attribute</label>
                        <select class="form-control" name="attributeName" id="attributeName">
                            <option selected disabled>Select Attribute</option>
                            <option value="size">Size</option>
                            <option value="weight">Weight</option>
                            <option value="color">Color</option>
                            <option value="unit">Unit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="attributeUnit">Name</label>
                        <input type="text" class="form-control" id="attributeUnit" name="attributeUnit" placeholder="Enter Category Name ...">
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
        $('#attributeForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var attributeUnit = $('#attributeUnit').val();
            var attributeNameSelect = document.getElementById('attributeName');
            console.log(attributeNameSelect.value);
            if (attributeNameSelect.value == 'Select Attribute') {
                $("#error").html("Attribute is required.");
                return;
            }
            if (!attributeUnit) {
                $("#error").html("Attribute name is required.");
                $("#categoryname").focus();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '<?php echo e(route("attribute.store")); ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#attributeForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Attribute has been added successfull!",
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/lenovo/SSD2/new/succu/ecommerce-V2/resources/views/admin/attribute/create.blade.php ENDPATH**/ ?>