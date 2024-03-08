@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<table id="example"  class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Label</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attributes as $attribute)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $attribute->label }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td >
                        @if($attribute->status == 'active')
                        <a href="#" onclick="attributeStatusUpdate({{$attribute->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="attributeStatusUpdate({{$attribute->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td>{{ $attribute->created_at }}</td>
                    <td>{{ $attribute->created_by }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('attribute.edit',['id' => $attribute->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation({{$attribute->id}})">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $attributes->links() }}
@endsection
@push('scripts')
<script>
    function showDeleteConfirmation(categoryId) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this Attribute?</h2></div>",
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
                    categoryDestroy(categoryId);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function attributeStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "{{ route('attribute.status.update', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Attribute has been Updated successfully!",
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
        function categoryDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "{{ route('attribute.destroy', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Attribute has been Deleted successfully!",
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