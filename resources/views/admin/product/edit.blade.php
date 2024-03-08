@extends('layouts.app')
@section('content')
<style>

.closeAttribute{
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
    background: #cccccc4a;
    border-top-right-radius: 20px;
}
.tab-content {
    border: 1px solid #dee2e6;
    border-top: 0;
    padding: 2rem 1rem;
    text-align: justify;
    max-height: 600px;
    overflow-y: scroll;
}
.select2{
    width: 100%!important;
}
</style>
<div class="row"> 
    <form class="forms-sample" id="updateProductForm" enctype="multipart/form-data">  
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">                
                        <div class="form-group">
                            <label for="productName">Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" value="{{$product->name}}" placeholder="Enter Product Name ...">
                            <input type="hidden" class="form-control" id="productId" name="productId" value="{{$product->id}}" >
                        </div>
                        <div class="form-group">
                            <label for="pageTitle">Slug</label>
                            <input type="text" class="form-control" id="productSlug" name="productSlug" value="{{$product->slug}}" oninput="validateSlug(this)" placeholder="Enter Page Title ...">
                        </div>
                        <div class="form-group">
                            <label for="attributeUnit">Short Desctiption</label>
                            <textarea class="form-control" rows="4" style="    height: 75px;" id="shortDesc" name="shortDesc">{{$product->short_Desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="attributeUnit">Desctiption</label>
                            <textarea class="form-control" rows="4" style="    height: 75px;" id="desc" name="desc">{!!$product->desc!!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="attributeUnit">Add Attribute</label>
                            <div class="attributeDiv">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#size" aria-selected="true" role="tab">Size (<span id="totalSize">0</span>)</a>
                                    </li> 
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#weight" aria-selected="true" role="tab" >Weight (<span id="totalWeight">0</span>)</a>
                                    </li> 
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#colour" aria-selected="true" role="tab">Colour (<span id="totalColor">0</span>)</a>
                                    </li> 
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#unit" aria-selected="true" role="tab">Unit (<span id="totalUnit">0</span>)</a>
                                    </li> 
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade active show" id="size" role="tabpanel">
                                        <div id="sizeAttributeBox" style="margin-bottom:10px"> 
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="addMoreSizeButton">+ Add More</a>
                                        </div>
                                    </div> 
                                    <div class="tab-pane fade " id="weight" role="tabpanel">
                                        <div id="weightAttributeBox" style="margin-bottom:10px"> 
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="addMoreWeightButton">+ Add More</a>
                                        </div>
                                    </div> 
                                    <div class="tab-pane fade " id="colour" role="tabpanel">
                                        <div id="colorAttributeBox" style="margin-bottom:10px"> 
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="addMoreColorButton">+ Add More</a>
                                        </div>
                                    </div> 
                                    <div class="tab-pane fade " id="unit" role="tabpanel">
                                        <div id="unitAttributeBox" style="margin-bottom:10px"> 
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" id="addMoreUnitButton">+ Add More</a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-between">                
                        <div>
                            <div class="form-group">
                                <label for="categoryname">Product Category</label>
                                <select class="form-control js-example-basic-single" name="categoryName" id="categoryName">
                                    <option selected disabled>Select Category</option>
                                </select>
                            </div>       
                            <div class="form-group">
                                <label for="metaTitle">Meta Title</label>
                                <input type="text" class="form-control" id="metaTitle" value="{{$product->meta_title}}" name="metaTitle" placeholder="Enter Category Name ...">
                            </div>
                            <div class="form-group">
                                <label for="metaDesc">Meta Desctiption</label>
                                <textarea class="form-control" rows="4" style="    height: 75px;" id="metaDesc" name="metaDesc">{{$product->meta_desc}}</textarea>
                            </div>
                            <div class="d-flex justify-content-evenly">
                                <div class="form-group">
                                    <label for="is_featured">Is Featured?</label>
                                    <input type="checkbox" id="is_featured" name="is_featured" {{$product->is_featured ? 'checked' : ''}}>
                                </div>
                                <div class="form-group">
                                    <label for="is_flash_sale">Is Flash Sales?</label>
                                    <input type="checkbox" id="is_flash_sale" name="is_flash_sale" {{$product->is_flash_sale ? 'checked' : ''}}>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Is Active?</label>
                                    <input type="checkbox" id="is_active" name="is_active" {{$product->is_active ? 'checked' : ''}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="file" id="featured_image" name="featured_image" class="form-controller">
                                <img id="imagePreview" src=" {{asset('images/products/' . $product->featured_img)}} " alt="Image Preview" style="    display: block;    width: 100%;height: auto;margin-top: 10px;">
                            </div>

                        </div>

                        <div class="d-flex flex-column">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <div style="color:red; padding-bottom:10px;" id="error"></div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

    </form>
</div>
@endsection
@push('scripts')
<script>

var attributes;
$(document).ready(function(){
    var products = {!! json_encode($product) !!};

    var sizeArray = JSON.parse(products.sizeArray);
    var weightArray = JSON.parse(products.weightArray);
    var colorArray = JSON.parse(products.colorArray);
    var unitArray = JSON.parse(products.unitArray);
    var categories = @json($categories);
    var attributes = @json($attributes);
    
    if(sizeArray){
        for(var i = 1; i<=sizeArray.length; i++){
            addMoreSizeButton(attributes);
            var attributeUnit = $(`#attributeUnit_${i}`);
            var selectedOptionValue = sizeArray[i-1].size; // Assuming 'attributeUnit' is the property in your sizeArray object
            attributeUnit.val(selectedOptionValue);
            var mrp = $(`#mrp_${i}`);
            mrp.val(sizeArray[i-1].mrp);
            var selling = $(`#selling_${i}`);
            selling.val(sizeArray[i-1].selling);

        }        
    }
    
    if(weightArray){
        for(var i = 1; i<=weightArray.length; i++){
            addMoreWeightButton(attributes);
            var weightAttributeUnit = $(`#weightAttributeUnit_${i}`);
            console.log(weightAttributeUnit,"weightAttributeUnitweightAttributeUnitweightAttributeUnitweightAttributeUnit");
            var selectedOptionValue = weightArray[i-1].weight; // Assuming 'attributeUnit' is the property in your weightArray object
            weightAttributeUnit.val(selectedOptionValue);
            var mrp = $(`#weightMrp_${i}`);
            mrp.val(weightArray[i-1].mrp);
            var selling = $(`#weightSelling_${i}`);
            selling.val(weightArray[i-1].selling);
        }        
    }

    if(colorArray){
        for(var i = 1; i<=colorArray.length; i++){
            addMoreColorButton(attributes);
            var colorAttributeUnit = $(`#colorAttributeUnit_${i}`);
            var selectedOptionValue = colorArray[i-1].color; // Assuming 'attributeUnit' is the property in your colorArray object
            colorAttributeUnit.val(selectedOptionValue);
            var mrp = $(`#colorMrp_${i}`);
            mrp.val(colorArray[i-1].mrp);
            var selling = $(`#colorSelling_${i}`);
            selling.val(colorArray[i-1].selling);

        }        
    }

    if(unitArray){
        for(var i = 1; i<=unitArray.length; i++){
            addMoreUnitButton(attributes);
            var unitAttributeUnit = $(`#unitAttributeUnit_${i}`);
            var selectedOptionValue = unitArray[i-1].unit; // Assuming 'attributeUnit' is the property in your unitArray object
            unitAttributeUnit.val(selectedOptionValue);
            var mrp = $(`#unitMrp_${i}`);
            mrp.val(unitArray[i-1].mrp);
            var selling = $(`#unitSelling_${i}`);
            selling.val(unitArray[i-1].selling);

        }        
    }

    var selectElement = document.getElementById('categoryName');

    // Clear existing options
    selectElement.innerHTML = '';

    // Loop through categories array and create option elements
    categories.forEach(function(category) {
        var option = document.createElement('option');
        option.value = category.id; // Assuming 'id' is the property name for category ID
        option.textContent = category.name; // Assuming 'name' is the property name for category name
        if (products.category == category.id) {
            option.selected = true;
        }
        selectElement.appendChild(option);
    });
    console.log(products.category,'categorycategorycategorycategory');
    $('.js-example-basic-single').select2(); 
    var editor1cfg = {}
    editor1cfg.toolbar = "basic";
    var editor1 = new RichTextEditor("#desc", editor1cfg);
    $('#updateProductForm').submit(function (e) {   
        e.preventDefault();
        // Basic form validation 
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData($('#updateProductForm')[0]);
        var editor1Content = editor1.getHTMLCode()
            var sizeArray = [];
            var weightArray= [];
            var colorArray= [];
            var unitArray= [];
            var totalSize = parseInt($("#totalSize").text());
            if (totalSize >= 1) {
                for (var i = 1; i <= totalSize; i++) {
                    var sizeSelling = $(`#selling_${i}`).val();
                    var sizeMrp = $(`#mrp_${i}`).val();
                    var sizeAttribute = $(`#attributeUnit_${i}`).val(); 
                    sizeArray.push({ size: sizeAttribute, selling: sizeSelling, mrp: sizeMrp });
                }
                formData.append('sizeArray',JSON.stringify(sizeArray));
            }
            var totalWeight = parseInt($("#totalWeight").text());
            if (totalWeight >= 1) {
                for (var i = 1; i <= totalWeight; i++) {
                    var weightSelling = $(`#weightSelling_${i}`).val();
                    var weightMrp = $(`#weightMrp_${i}`).val();
                    var weightAttribute = $(`#weightAttributeUnit_${i}`).val(); 
                    weightArray.push({ weight: weightAttribute, selling: weightSelling, mrp: weightMrp });
                }
                formData.append('weightArray',JSON.stringify(weightArray));
            }
            var totalColor = parseInt($("#totalColor").text());
            if (totalColor >= 1) {
                for (var i = 1; i <= totalColor; i++) {
                    var colorSelling = $(`#colorSelling_${i}`).val();
                    var colorMrp = $(`#colorMrp_${i}`).val();
                    var colorAttribute = $(`#colorAttributeUnit_${i}`).val(); 
                    colorArray.push({ color: colorAttribute, selling: colorSelling, mrp: colorMrp });
                }
                formData.append('colorArray',JSON.stringify(colorArray));
            }
            var totalUnit = parseInt($("#totalUnit").text());
            if (totalUnit >= 1) {
                for (var i = 1; i <= totalUnit; i++) {
                    var unitSelling = $(`#unitSelling_${i}`).val();
                    var unitMrp = $(`#unitMrp_${i}`).val();
                    var unitAttribute = $(`#unitAttributeUnit_${i}`).val(); 
                    unitArray.push({ unit: unitAttribute, selling: unitSelling, mrp: unitMrp });
                }
                formData.append('unitArray',JSON.stringify(unitArray));
            }
            console.log(colorArray,"weightArrayweightArrayweightArrayweightArrayweightArrayweightArray"); // Display the populated sizeArray in the console

            var featuredImageInput = document.getElementById('featured_image');
            var featuredImageFile = featuredImageInput.files[0];
            formData.append('featured_image', featuredImageFile);

            formData.append('_token', csrfToken);
        $("#error").hide();
        $.ajax({
            url: '{{route("product.update")}}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            // contentType: false,
            // processData: false,
            success: function (response) {
                console.log(response); // You can replace this with any other action
                if(response.status){
                    // $("#success").html(response.message);                                
                    $('#updateProductForm')[0].reset();
                    Swal.fire({
                        title: "Success!",
                        text: "Product has been Updated successfull!",
                        icon: "success"
                    }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('product.index') }}";
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
    document.getElementById('addMoreSizeButton').addEventListener('click', function() {
        addMoreSizeButton(attributes);
    });
    document.getElementById('addMoreWeightButton').addEventListener('click', function() {
        addMoreWeightButton(attributes);
    });
    document.getElementById('addMoreColorButton').addEventListener('click', function() {
        addMoreColorButton(attributes);
    });
    document.getElementById('addMoreUnitButton').addEventListener('click', function() {
        addMoreUnitButton(attributes);
    });
  document.getElementById('featured_image').addEventListener('change', function(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function() {
          var imgPreview = document.getElementById('imagePreview');
          imgPreview.src = reader.result;
          imgPreview.style.display = 'block'; // Show the image preview
      };

      // Read the selected file as a data URL
      if (input.files && input.files[0]) {
          reader.readAsDataURL(input.files[0]);
      }
  });
});


</script>
@endpush