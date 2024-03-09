<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="bookdemoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookdemoLabel">Book Your Demo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="color:red" id="book_error"></div>
        <form id="bookDemoForm">
          @csrf
          <div class="row g-3">
              <div class="col-md-6">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Your Name">
                      <label for="name">Your Name</label>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-floating">
                      <input type="email" class="form-control" id="book_email" name="book_email" placeholder="Your Email">
                      <label for="email">Your Email</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <input type="number" class="form-control" id="book_mobile" name="book_mobile" placeholder="Your Mobile">
                      <label for="name">Your Mobile</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <input type="text" class="form-control" id="book_orgName" name="book_orgName"  placeholder="Your Organization">
                      <label for="name">Organization Name</label>
                  </div>
              </div>
              <div class="col-12">
                  <div class="form-floating">
                      <textarea class="form-control" placeholder="Leave your requirement here" id="book_requirement" style="height: 150px" name="book_requirement"></textarea>
                      <label for="message">Requirements</label>
                  </div>
              </div>
              <div class="col-12">
                  <button class="btn btn-primary w-100 py-3" type="submit">Book Demo</button>
              </div>
          </div>

          <div style="color:green;display: flex;align-items: center;justify-content: center;margin-top: 50px;" id="book_success"></div>
        </form>
      </div> 
    </div>
  </div>
</div>
<script>
        $(document).ready(function(){
            $('#bookDemoForm').submit(function (e) {

                e.preventDefault();
                // // Basic form validation
                var name = $('#book_name').val();
                var email = $('#book_email').val();
                var mobile = $('#book_mobile').val(); 
                var requirement = $('#book_requirement').val();
                var orgName = $('#book_orgName').val();
                if (!name || !email || !mobile || !requirement) {
                    $("#book_error").html("Please fill the empty fields.");
                    return;
                }

                $("#book_error").hide();
                $.ajax({
                    url: '/book-demo',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response); // You can replace this with any other action
                        if(response.status){
                            $("#book_success").html(response.message);                                        
                            $('#bookDemoForm')[0].reset();
                            setTimeout(function() {
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