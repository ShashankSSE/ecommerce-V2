@extends('layouts.app')
@section('content')
<div class="row">    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Faq</h4>
                <form class="forms-sample" id="pageForm">
                    @csrf
                    <div class="form-group">
                        <label for="pageTitle">Faq Question</label>
                        <input type="text" class="form-control" id="question" value="{{$faq->question}}" name="question" placeholder="Enter Page Title ...">
                        <input type="hidden" class="form-control" id="faqId" value="{{$faq->id}}" name="faqId" placeholder="Enter Page Title ...">
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Faq Answere</label>
                        <textarea class="form-control" id="answere" name="answere">{{$faq->answere}}</textarea>
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
        var editor1 = new RichTextEditor("#answere", editor1cfg);
        $('#pageForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var question = $('#question').val();
            if (!question) {
                $("#error").html("Question is required.");
                $("#question").focus();
                return;
            }

            $("#error").hide();
            $.ajax({
                url: '{{route("faq.update")}}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#pageForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Faq has been added successfull!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('faq.index') }}";
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