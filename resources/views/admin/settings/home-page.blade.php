@extends('layouts.app')
@section('content')
<style>
    .form-check{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }
    .form-check label{
        margin-left: 0!important;
        margin-bottom: 0!important;
    }
</style>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#banner" aria-selected="true" role="tab">Banner</a>
    </li>
    <!-- <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#featuredCategories" aria-selected="false" tabindex="-1"
            role="tab">Featured Categories</a>
    </li> 
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#quote" aria-selected="false" tabindex="-1"
            role="tab">Quote of the day</a>
    </li> 
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#topBrands" aria-selected="false" tabindex="-1"
            role="tab">Top Brands</a>
    </li>  -->
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade show active" id="banner" role="tabpanel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4" style="    border-right: 1px solid #ccc;">
                    <form id="bannerForm"  style="display:block;" enctype="multipart/form-data">  
                        <div class="form-group">
                            <lable class="form-label">Banner Title</label>
                            <input type="text" class="form-control" id="bannerTitle"   placeholder="Add banner title.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner text</label>
                            <input type="text" class="form-control" id="bannerText"   placeholder="Add banner text.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner sequence</label>
                            <input type="number" class="form-control" id="bannerSequence"   placeholder="Add banner sequencing.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Button Url</label>
                            <input type="text" class="form-control" id="buttonUrl"   placeholder="Add button url.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="bannerImage"   accept="image/*" required>
                            <small id="imageHelp" class="form-text text-muted">Image size should be 1920 x 950 px.</small>
                        </div>
                        <div class="form-group d-flex " style="justify-content: space-around;"> 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bannerStatus">
                            <label class="form-check-label" for="bannerStatus">
                                Status
                            </label>
                        </div>
                            <button type="submit" class="btn btn-primary" id="save">Save</button> 
                        </div>
                    </form>
                    <form id="bannerFormUpdate" enctype="multipart/form-data" style="display:none;">  
                        <div class="form-group">
                            <lable class="form-label">Banner Title</label>
                            <input type="text" class="form-control" id="bannerTitleUpdate"   placeholder="Add banner title.." required>
                            <input type="hidden" class="form-control" id="bannerIdUpdate">
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner text</label>
                            <input type="text" class="form-control" id="bannerTextUpdate"   placeholder="Add banner text.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner sequence</label>
                            <input type="number" class="form-control" id="bannerSequenceUpdate"   placeholder="Add banner sequencing.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Button Url</label>
                            <input type="text" class="form-control" id="buttonUrlUpdate"   placeholder="Add button url.." required>
                        </div>
                        <div class="form-group">
                            <lable class="form-label">Banner Image</label>
                            <input type="file" class="form-control" id="bannerImageUpdate"   accept="image/*" >
                            <small id="imageHelp" class="form-text text-muted">Image size should be 1920 x 950 px.</small>
                        </div>
                        <div class="form-group d-flex " style="justify-content: space-around;"> 
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="bannerStatusUpdate">
                            <label class="form-check-label" for="bannerStatus">
                                Status
                            </label>
                        </div>
                            <button type="submit" class="btn btn-primary" id="save">Update</button> 
                        </div>
                    </form>
                </div>
                <div class="col-sm-8">
                    <table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Sequence</th>
                                <th>Created On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banner as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td> 
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{$item->image}}" style="    width: 100px;"></td> 
                                    <td >
                                        @if($item->status)
                                        <a href="#" onclick="bannerStatusUpdate({{$item->id}})">
                                            <div id="active"><i class="mdi mdi-check"></i></div>
                                        </a>
                                        @else
                                        <a href="#" onclick="bannerStatusUpdate({{$item->id}})">
                                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                                        </a>
                                        @endif
                                    </td>
                                    <td>{{ $item->sequence }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="javascript:void(0);" onclick="edit({{$item->id}})">
                                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                                            </a>  
                                            <a href="#" onclick="showDeleteConfirmation({{$item->id}})">
                                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="featuredCategories" role="tabpanel">
        <p>Featured Categories</p>
    </div> 
    <div class="tab-pane fade" id="quote" role="tabpanel">
        <p>quote</p>
    </div> 
    <div class="tab-pane fade" id="topBrands" role="tabpanel">
        <p>Top Brands</p>
    </div> 
</div>
@endsection
@push('scripts')
<script>
        function showDeleteConfirmation(bannerId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this banner?</h2></div>",
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
                    bannerDestroy(bannerId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
    function bannerStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "{{ route('home-page.banner.status.update', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Banner has been Updated successfully!",
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
    function bannerDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "{{ route('home-page.banner.destroy', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Banner has been Deleted successfully!",
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
$(document).ready(function() { 
    $("#bannerForm").on('submit',function(e){
        e.preventDefault();
        
        var csrfToken = '{{ csrf_token() }}'; 
        var title = $("#bannerTitle").val();
        var text = $("#bannerText").val();
        var url = $("#buttonUrl").val();
        var sequence = $("#bannerSequence").val();
        var image = $("#bannerImage")[0];
        console.log(image);
        var imageFile = image.files[0];
        var bannerStatus = $('#bannerStatus').prop('checked');

        var formData = new FormData($('#bannerForm')[0]); 

        formData.append('title', title);
        formData.append('text', text);
        formData.append('url', url);
        formData.append('sequence', sequence);
        formData.append('imageFile', imageFile);
        formData.append('bannerStatus', bannerStatus); 
        formData.append('_token', csrfToken);
        $.ajax({
            url: '{{route("home-page.banner.store")}}',
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
                    $('#bannerForm')[0].reset();
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
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
    })

});

$("#bannerFormUpdate").on('submit',function(e){
        e.preventDefault(); 
        var csrfToken = '{{ csrf_token() }}'; 
        var id = $("#bannerIdUpdate").val();
        var title = $("#bannerTitleUpdate").val();
        var text = $("#bannerTextUpdate").val();
        var url = $("#buttonUrlUpdate").val();
        var sequence = $("#bannerSequenceUpdate").val();
        var imageFile;
        var image = $("#bannerImageUpdate")[0]; 
        if(image){
            imageFile = image.files[0];
        }
        var bannerStatus = $('#bannerStatus').prop('checked');

        var formData = new FormData($('#bannerForm')[0]); 

        formData.append('id', id);
        formData.append('title', title);
        formData.append('text', text);
        formData.append('url', url);
        formData.append('sequence', sequence);
        formData.append('imageFile', imageFile);
        formData.append('bannerStatus', bannerStatus); 
        formData.append('_token', csrfToken);
        $.ajax({
            url: '{{route("home-page.banner.update")}}',
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
                    $('#bannerFormUpdate')[0].reset();
                    $('#bannerForm')[0].reset();
                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                        window.location.reload();
                    });
                }else{
                    alert("Something went wrong!");
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    })
function edit(id){
    $("#bannerForm").hide();
    $("#bannerFormUpdate").show();
    $.ajax({
        url: '{{route("home-page.banner.edit", ":id") }}'.replace(':id', id),
        type: 'GET',  
        success: function (response) {
            if(response.status){
                $("#bannerIdUpdate").val(response.banner.id); 
                $("#bannerTitleUpdate").val(response.banner.title); 
                $("#bannerTextUpdate").val(response.banner.text);
                $("#buttonUrlUpdate").val(response.banner.url);
                $("#bannerSequenceUpdate").val(response.banner.sequence);
                $("#bannerStatusUpdate").prop("checked", response.banner.status == 1);
                console.log(response.banner.status,"response.banner.status");
            }
             
        },
        error: function (error) {
            console.log(error);
        },
    });
}
</script>
@endpush