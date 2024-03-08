        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">Contact Us</h6>
                            <h2 class="mt-2">Contact For Any Query</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <div style="color:red" id="error"></div>
                            <form id="anotherContactForm">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px" name="message"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>

                                <div style="color:green;display: flex;align-items: center;justify-content: center;margin-top: 50px;" id="success"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <script>
        $(document).ready(function(){
            $('#anotherContactForm').submit(function (e) {
                e.preventDefault();
                // Basic form validation
                var name = $('#name').val(); 
                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                if (!name || !email || !subject || !message) {
                    $("#error").html("Please fill the empty fields.");
                    return;
                } 

                $("#error").hide();
                $.ajax({
                    url: '/submit-form',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response); // You can replace this with any other action
                        if(response.status){
                            $("#success").html(response.message);
                            $('#anotherContactForm')[0].reset();
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