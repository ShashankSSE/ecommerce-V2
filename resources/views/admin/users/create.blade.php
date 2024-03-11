@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add New User</h4>
                <form class="forms-sample" id="userForm">
                    @csrf
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter user Name ..." required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter user Email ..." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter user Password ..." required>
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Is Admin?</label>
                        <input type="checkbox" id="is_admin" name="is_admin">
                    </div>
                    <div style="color:red; padding-bottom:10px;" id="error"></div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#userForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var userName = $('#username').val();
            if (!userName) {
                $("#error").html("user name is required.");
                $("#username").focus();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '{{route("user.store")}}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#userForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "User has been added successfull!",
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
@endpush