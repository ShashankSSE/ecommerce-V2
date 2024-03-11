@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
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
            @foreach ($subCategories as $subCategory)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $subCategory->title }}</td>
                    <td>{{ $subCategory->category->name }}</td>
                    <td>{{ $subCategory->slug }}</td>
                    <td>
                        @if($subCategory->is_active)
                        <a href="#" onclick="subCategoryStatusUpdate({{$subCategory->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="subCategoryStatusUpdate({{$subCategory->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td>{{ $subCategory->created_at }}</td>
                    <td>{{ $subCategory->created_by }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('sub-category.edit',['id' => $subCategory->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation({{$subCategory->id}})">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{--<center>{{ $subCategories->links() }}</center>--}}
@endsection
@push('scripts')
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
                url: "{{ route('sub-category.status.update', ['id' => ':id']) }}".replace(':id', id),
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
                url: "{{ route('sub-category.destroy', ['id' => ':id']) }}".replace(':id', id),
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
@endpush