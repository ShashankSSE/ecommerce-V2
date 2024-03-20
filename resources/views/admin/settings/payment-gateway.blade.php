@extends('layouts.app')
@section('content')
<style>
    .form-group{
        display: flex;
        gap: 5px;
        flex-direction:column; 
    }
    .form-control{
        display: flex;
        width: 50%;
        align-items: center;
        justify-content: center;
        line-height: 5px;
    }
    .form-group label {
        font-size: 0.812rem;
        line-height: 1.4rem;
        vertical-align: top;
        margin-bottom: 0.5rem;
        width: 20%;
    }
    #media{
        width: 100%; display:flex;gap:5px;margin-bottom:5px;
    }
    textarea{
        height: 100px!important;
        line-height: 1!important;
    }
    #paymentGateway,#paymentGatewayMode{
        line-height: 1!important;
    }
    #removeSocialBtn{
        font-size: 18px;
        border-radius: 5px;
        padding: 0px 13px 5px 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="row">    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Payment Gateway Settings</h4>
                <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form class="forms-sample" id="paymentGatewayForm">
                        @csrf 
                        <div class="form-group">
                            <label for="pageDesctiption">Payment Gateway</label>
                            <div style="width: 100%;">
                                <select class="form-control" id="paymentGateway" name="paymentGateway"  style="width:100%;" required>
                                    <option value="" selected disabled>Select payment Gateway</option>
                                    <option value="razorpay">Razorpay</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="pageDesctiption">Api Key</label>
                            <div style="width: 100%;">
                                <input style="width:100%;" type="text" class="form-control" value="" id="paymentGatewayKey" name="paymentGatewayKey" value="" placeholder="Enter  Api Key ..." required >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="pageDesctiption">Api Secret</label>
                            <div style="width: 100%;">
                                <input style="width:100%;" type="text" class="form-control" value="" id="paymentGatewaySecret" name="paymentGatewaySecret" value="" placeholder="Enter  Api Secret ..." required>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="pageDesctiption">Mode</label>
                            <div style="width: 100%;">
                                <select class="form-control" id="paymentGatewayMode" name="paymentGatewayMode"  style="width:100%;" required>
                                    <option value="" selected disabled>Select Mode</option>
                                    <option value="test">Test</option>
                                    <option value="live">Live</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group" style="    flex-direction: row;align-items: center;">
                            <label for="is_active" style="margin-bottom: 0rem;">Is Active?</label>
                            <input type="checkbox" id="is_active" name="is_active">
                        </div>
                        <div style="color:red; padding-bottom:10px;" id="error"></div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
@push('scripts')
<script> 
    $(document).ready(function(){
        $('#paymentGatewayForm').submit(function (e) { 
            e.preventDefault();
            
            var paymentGateway = $('#paymentGateway').val();
            var paymentGatewayKey = $('#paymentGatewayKey').val();
            var paymentGatewaySecret = $('#paymentGatewaySecret').val();
            var paymentGatewayMode = $('#paymentGatewayMode').val();
            var is_active = ($('#is_active').prop('checked')) ? 1 : 0; 
            $("#error").hide();
            $.ajax({
                url: '{{route("admin.paymentgateway.update")}}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.success){
                        // $("#success").html(response.message);                                
                        $('#paymentGatewayForm')[0].reset();
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
        });
    });
    $('#paymentGateway').change(function() {
    // Your onchange event handler code here
    var selectedValue = $(this).val(); 
    $.ajax({
        url: '{{route("admin.paymentgateway.edit")}}',
        type: 'POST',
        data: { 'paymentGateway': selectedValue },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            console.log(response); // You can replace this with any other action
            if(response.success){
                var paymentGateway = response.paymentGateway;
                if(paymentGateway){
                    $('#paymentGateway').val(paymentGateway.payment_gateway);
                    $('#paymentGatewayKey').val(paymentGateway.key);
                    $('#paymentGatewaySecret').val(paymentGateway.secret);
                    $('#paymentGatewayMode').val(paymentGateway.mode);
                    if (paymentGateway.is_active) {
                        $('#is_active').prop('checked', true);
                    } else {
                        $('#is_active').prop('checked', false);
                    }
                }
            }else{
                alert("Something went wrong!");
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
    // Do something with the selected value
});
</script>
@endpush
