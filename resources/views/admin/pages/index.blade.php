@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<style>
    .addMorePages{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
</style>
<div class="addMorePages">
    <a href="{{route('page.create')}}" class="btn btn-primary btn-sm">Add +</a>
</div>
<table id="dataTable"  class="mdl-data-table display wrap" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Url</th>
                <th>Is Active ?</th>
                <th>Created On</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td >
                        @if($page->is_active)
                        <a href="#" onclick="pageStatusUpdate({{$page->id}})">
                            <div id="active"><i class="mdi mdi-check"></i></div>
                        </a>
                        @else
                        <a href="#" onclick="pageStatusUpdate({{$page->id}})">
                            <div id="inactive"><i class="mdi mdi-close"></i></div>
                        </a>
                        @endif
                    </td>
                    <td>{{ $page->created_at }}</td>
                    <td>{{ $page->created_by }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('page.edit',['id' => $page->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a>  
                            <a href="#" onclick="showDeleteConfirmation({{$page->id}})">
                                <div id="inactive"><i class="mdi mdi-delete"></i></div>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pages->links() }}
@endsection
@push('scripts')
<script>
    function showDeleteConfirmation(id) {
        Swal.fire({
            html: "<div class='title'><h2>Are you sure you wanted to delete<br>this page?</h2></div>",
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
                    pageDestroy(id);
                    Swal.close();
                });
                popup.querySelector('.swal2-cancel').addEventListener('click', function() {
                    Swal.close();
                });
            }
        });
    }
        function pageStatusUpdate (id) { 
            $("#error").hide();
            $.ajax({
                url: "{{ route('page.status.update', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Page has been Updated successfully!",
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
        function pageDestroy(id){
            $("#error").hide();
            $.ajax({
                url: "{{ route('page.destroy', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);     
                        Swal.fire({
                            title: "Success!",
                            text: "Page has been Deleted successfully!",
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