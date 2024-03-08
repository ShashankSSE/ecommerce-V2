<div class="modal fade" id="getBroucher" tabindex="-1" role="dialog" aria-labelledby="getBroucherLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="getBroucherLabel">Fill this form to get the Broucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="color:red" id="broucher_error"></div>
        <form id="getBroucherForm">
          @csrf
          <div class="row g-3">
              <div class="col-md-6">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="broucher_name" name="broucher_name" placeholder="Your Name">
                      <label for="name">Your Name</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-floating">
                      <input type="email" class="form-control" id="broucher_email" name="broucher_email" placeholder="Your Email">
                      <label for="email">Your Email</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <input type="number" class="form-control" id="broucher_mobile" name="broucher_mobile" placeholder="Your Mobile">
                      <label for="name">Your Mobile</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="broucher_orgName" name="broucher_orgName"  placeholder="Your Organization">
                      <label for="name">Organization Name</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave your requirement here" id="broucher_requirement" style="height: 150px" name="broucher_requirement"></textarea>
                      <label for="message">Requirements</label>
                  </div>
              </div>
              <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit">Book Demo</button>
              </div>
          </div>

          <div style="color:green;display: flex;align-items: center;justify-content: center;margin-top: 50px;" id="broucher_success"></div>
        </form>
      </div> 
    </div>
  </div>
</div>
<script>
        $(document).ready(function(){
            $('#getBroucherForm').submit(function (e) {

                e.preventDefault();
                // // Basic form validation
                var name = $('#broucher_name').val();
                var email = $('#broucher_email').val();
                var mobile = $('#broucher_mobile').val(); 
                var requirement = $('#broucher_requirement').val();
                var orgName = $('#broucher_orgName').val();
                if (!name || !email || !mobile || !requirement) {
                    $("#broucher_error").html("Please fill the empty fields.");
                    return;
                }

                $("#broucher_error").hide();
                $.ajax({
                    url: '/get-broucher',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response); // You can replace this with any other action
                        if(response.status){
                            $("#broucher_success").html(response.message);                                        
                            $('#getBroucherForm')[0].reset();
                            setTimeout(function() {
                                let broucher_url = response.broucher_url;
                                window.open(broucher_url, "_blank");
                                location.reload();
                            }, 1000); 
                            
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