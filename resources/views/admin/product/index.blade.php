@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
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
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $product->name }}</td>
                    <td><img src="{{asset('images/products/' . $product->featured_img)}}" style="    width: 100px;"></td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->subcategory }}</td>
                    <td >
                        @if($product->is_featured)
                        <a href="#" onclick="productFeaturedStatusUpdate({{$product->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="productFeaturedStatusUpdate({{$product->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td >
                        @if($product->is_flash_sale)
                        <a href="#" onclick="productFlashSaleStatusUpdate({{$product->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="productFlashSaleStatusUpdate({{$product->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td >
                        @if($product->is_active)
                        <a href="#" onclick="productStatusUpdate({{$product->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="productStatusUpdate({{$product->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->created_by }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('product.edit',['id' => $product->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation({{$product->id}})">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
@push('scripts')
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
                url: "{{ route('product.status.update', ['id' => ':id']) }}".replace(':id', id),
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
                url: "{{ route('product.flashSale.update', ['id' => ':id']) }}".replace(':id', id),
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
                url: "{{ route('product.featured.update', ['id' => ':id']) }}".replace(':id', id),
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
                url: "{{ route('product.destroy', ['id' => ':id']) }}".replace(':id', id),
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
@endpush