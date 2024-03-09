@extends('layouts.app')
@section('content')
@if(session('success'))
    
@endif
<style>
    .addMoreUsers{
        position: absolute;
        left: 50%;
        z-index:9999;
    }
</style>
<div class="addMoreUsers">
    <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">Add +</a>
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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td >
                        @if($user->is_admin)
                            <center>Admin</center>
                        @else
                            <center>Normal User</center>
                        @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <!-- <td>{{ $user->created_by }}</td> -->
                    <td>
                        <div class="actions">
                            <a href="{{ route('user.edit',['id' => $user->id]) }}">
                                <div id="active"><i class="mdi mdi-pencil"></i></div>
                            </a> 
                            @if(!$user->is_admin)                            
                                <a href="#" onclick="showDeleteConfirmation({{$user->id}})">
                                    <div id="inactive"><i class="mdi mdi-delete"></i></div>
                                </a>
                            @endif                            
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
@push('scripts')
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
                url: "{{ route('user.status.update', ['id' => ':id']) }}".replace(':id', id),
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
                url: "{{ route('user.destroy', ['id' => ':id']) }}".replace(':id', id),
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
@endpush