@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Category</h4> 
                <form class="forms-sample" id="attributeForm">
                    @csrf
                    <div class="form-group">
                        <label for="categoryname">Attribute</label>
                        <select class="form-control" name="attributeName" id="attributeName">
                            <option selected disabled>Select Attribute</option>
                            <option value="size" {{$attribute->label == 'size' ? 'selected' : ''}}>Size</option>
                            <!-- <option value="weight" {{$attribute->label == 'weight' ? 'selected' : ''}}>Weight</option> -->
                            <option value="color" {{$attribute->label == 'color' ? 'selected' : ''}}>Color</option>
                            <!-- <option value="unit" {{$attribute->label == 'unit' ? 'selected' : ''}}>Unit</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="attributeUnit">Name</label>
                        <input type="hidden" class="form-control" id="attributeId" name="attributeId" value="{{$attribute->id}}">
                        <input type="text" class="form-control" id="attributeUnit" name="attributeUnit" value="{{$attribute->name}}" placeholder="Enter Category Name ...">
                    </div>
                    <div style="color:red; padding-bottom:10px;" id="error"></div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
@push('scripts')
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
                url: '{{route("attribute.update")}}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#attributeForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Attribute has been Updated successfully!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('attribute.index') }}";
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
        });
    });
</script>
@endpush