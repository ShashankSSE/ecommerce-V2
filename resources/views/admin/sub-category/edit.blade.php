@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Sub Category</h4> 
                <form class="forms-sample" id="updateSubCategoryForm">
                    @csrf
                    <div class="form-group">
                        <label for="subCategoryName">Name</label>
                        <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" value="{{$subCategory->title}}" placeholder="Enter Sub Category Name ..." required>
                        <input type="hidden" class="form-control" id="subCategoryId" name="subCategoryId" value="{{$subCategory->id}}">
                    </div>
                    <div class="form-group">
                        <label for="pageTitle">Slug</label>
                        <input type="text" class="form-control" id="subCategorySlug" name="subCategorySlug" value="{{$subCategory->slug}}" oninput="validateSlug(this)" placeholder="Enter slug ..." required>
                    </div>            
                    <div class="form-group">
                        <label for="categoryId">Name</label>
                        <select type="text" class="form-control js-example-basic-single" id="categoryId" name="categoryId" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$subCategory->category_id == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                            @endforeach
                        <select>
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
                url: '{{route("sub-category.update")}}',
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
                                window.location.href = "{{ route('sub-category.index') }}";
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
@endpush