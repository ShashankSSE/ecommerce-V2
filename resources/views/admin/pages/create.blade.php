@extends('layouts.app')
@section('content')
<div class="row">    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Page</h4>
                <form class="forms-sample" id="pageForm">
                    @csrf
                    <div class="form-group">
                        <label for="pageTitle">Title</label>
                        <input type="text" class="form-control" id="pageTitle" name="pageTitle" placeholder="Enter Page Title ...">
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Desctiption</label>
                        <textarea class="form-control" id="desc" name="desc"></textarea>
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
        var editor1cfg = {}
        editor1cfg.toolbar = "basic";
        var editor1 = new RichTextEditor("#desc", editor1cfg);
        $('#pageForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var pageTitle = $('#pageTitle').val();
            if (!pageTitle) {
                $("#error").html("Page Title is required.");
                $("#pageTitle").focus();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '{{route("page.store")}}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#pageForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Page has been added successfull!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('page.index') }}";
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