@extends('layouts.app')
@section('content')
<style>
    .form-group{
        display: flex;
        gap: 100px;
        align-items: center;
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
        width: 10%;
    }
    #media{
        width: 100%; display:flex;gap:5px;margin-bottom:5px;
    }
    textarea{
        height: 100px!important;
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
                <h4 class="card-title">Update Settings</h4>
                <form class="forms-sample" id="updateSettingsForm">
                    @csrf
                    <div class="form-group">
                        <label for="pageTitle">Header Logo</label>  
                        <input type="file" class="form-control" id="headerLogo" name="headerLogo" value="" placeholder="Enter Page Title ...">
                        <img id="headerLogoPreview" src="{{ $settings->header_logo !== 'default_logo.png' ? asset('images/site/' . $settings->header_logo) : asset('images/site/no-img.png') }}" alt="Image Preview" style="    display: block;        width: 100px;height: 100px; auto;margin-top: 10px;">
                    </div>
                    
                    <div class="form-group">
                        <label for="pageTitle">Footer Logo</label>
                        <input type="file" class="form-control" id="footerLogo" name="footerLogo" value="" placeholder="Enter Page Title ...">
                        <img id="footerLogoPreview" src="{{ $settings->footer_logo !== 'default_footer_logo.png' ? asset('images/site/' . $settings->footer_logo) : asset('images/site/no-img.png') }}" alt="Image Preview" style="    display: block;        width: 100px;height: 100px; auto;margin-top: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="pageTitle">Favicon</label>
                        <input type="file" class="form-control" id="favicon" name="favicon" value="" placeholder="Enter Page Title ...">
                        <img id="faviconPreview" src="{{ $settings->favicon !== 'default_favicon.png' ? asset('images/site/' . $settings->favicon) : asset('images/site/no-img.png') }}" alt="Image Preview" style="    display: block;        width: 100px;height: 100px; auto;margin-top: 10px;">
                    </div>
                    
                    <div class="form-group">
                        <label for="pageDesctiption">Mobile</label>
                        <div style="width: 50%;">
                            <input style="width:100%;" type="number" class="form-control" value="{{$settings->mobile}}" id="mobile" name="mobile" value="" placeholder="Enter Mobile ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Email</label>
                        <div style="width: 50%;">
                            <input style="width:100%;" type="email" class="form-control" value="{{$settings->email}}" id="email" name="email" value="" placeholder="Enter Email ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Address</label>
                        <textarea class="form-control" id="address" name="address"> {{$settings->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Meta Title</label>
                        <input type="text" class="form-control" id="metaTitle" value="{{$settings->meta_title}}" name="metaTitle" value="" placeholder="Enter Meta Title ...">
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Meta Keyword</label>
                        <div style="width: 50%;">
                            <p style="color:red">For multiple keyword please add comma (,) and proceed</p>
                            <input style="width:100%;" type="text" class="form-control" value="{{$settings->meta_keyword}}" id="metaKey" name="metaKey" value="" placeholder="Enter Meta Keys ... eg. key1,key2...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Short Desctiption</label>
                        <textarea class="form-control" id="desc" name="desc">{{$settings->short_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Meta Description</label>
                        <textarea class="form-control" id="metaDesc" name="metaDesc">{{$settings->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Credits</label>
                        <input type="text" class="form-control" id="creadits" value="{{$settings->credits}}" name="creadits" value="" placeholder="Enter Credits ...">
                    </div>
                    <div class="form-group">
                        <label for="pageDesctiption">Social Media (<span id="totalSocial">1</span>)</label>
                        <div id="social"  style="    width: 72%; "> 
                        </div>
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
    var socialCount = 0;
    $(document).ready(function(){
        var socials = @json($settings);
        socials =JSON.parse(socials.social_media)
        console.log(Object.keys(socials).length,"socialssocialssocialssocials");
        $("#totalSocial").html(Object.keys(socials).length);
        var socialContainer = document.getElementById('social');
        for (var index = 0; index < Object.keys(socials).length; index++) {
            var platform = Object.keys(socials)[index];
            var url = socials[platform];
            var newSocialInput = document.createElement('div');
            newSocialInput.id = "media";
            newSocialInput.innerHTML = `
                <select class="form-control" style="width: 15%; line-height: 20px;" id="social_${index}">
                <option value="Facebook" ${platform == 'Facebook' ? 'selected' : ''}>Facebook</option>
                <option value="Youtube" ${platform == 'Youtube' ? 'selected' : ''}>Youtube</option>
                <option value="Instagram" ${platform == 'Instagram' ? 'selected' : ''}>Instagram</option>
                <option value="Whatsapp" ${platform == 'Whatsapp' ? 'selected' : ''}>Whatsapp</option>
                <option value="Snapchat" ${platform == 'Snapchat' ? 'selected' : ''}>Snapchat</option>
                <option value="Twitter" ${platform == 'Twitter' ? 'selected' : ''}>Twitter</option>
                </select>
                <input type="text" class="form-control" id="url_${index}" value="${url}" placeholder="Enter Url ...">
            `;
            if (index === 0) {
                // Add the "+" button only for the first social media input
                var addBtn = document.createElement('a');
                addBtn.id = "addSocialBtn";
                addBtn.classList.add('btn', 'btn-sm', 'btn-primary');
                addBtn.href = 'javascript:void(0);';
                addBtn.style = "font-size: 30px; border-radius: 5px; padding: 2px 10px 1px 10px;";
                addBtn.innerHTML = '+';
                newSocialInput.appendChild(addBtn);
            } else if (index === Object.keys(socials).length - 1) {
                // Add remove button only for the last social media input
                var removeBtn = document.createElement('a');
                removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'remove-btn');
                removeBtn.id = "removeSocialBtn";
                removeBtn.innerHTML = 'x';
                removeBtn.href = 'javascript:void(0);';
                removeBtn.onclick = function() {
                    removeSocial(this);
                };
                newSocialInput.appendChild(removeBtn);
            }
            // Append the new social media input to the container
            socialContainer.appendChild(newSocialInput);
            socialCount++;
            console.log(socialCount,"socialCountsocialCountsocialCountsocialCountsocialCount")
        }

        $('#updateSettingsForm').submit(function (e) { 
            e.preventDefault();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData($('#updateSettingsForm')[0]);

            var socialArray = [];
            var totalSocial = parseInt($("#totalSocial").text());
            if (totalSocial >= 1) {
                for (var i = 0; i < totalSocial; i++) {
                    var social = $(`#social_${i}`).val();
                    var url = $(`#url_${i}`).val(); 
                    socialArray.push({ social, url});
                }
                var jsonString = JSON.stringify(socialArray);
                var jsonArray = JSON.parse(jsonString);

                // Initialize an empty object to store the converted data
                var convertedObject = {};

                // Iterate over each object in the array and construct the new object
                jsonArray.forEach(function(item) {
                    convertedObject[item.social] = item.url;
                });

                // Convert the object to JSON string
                var convertedJsonString = JSON.stringify(convertedObject);

                // Output the result
                console.log(convertedJsonString,"socialArraysocialArraysocialArraysocialArraysocialArray");
                formData.append('socialArray',convertedJsonString);
            }
            $("#error").hide();
            $.ajax({
                url: '{{route("settings.update")}}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response); // You can replace this with any other action
                    if(response.status){
                        // $("#success").html(response.message);                                
                        $('#updateSettingsForm')[0].reset();
                        Swal.fire({
                            title: "Success!",
                            text: "Settings has been updated successfull!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('settings.index') }}";
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

    document.addEventListener('click', function(event) {
        if (event.target && event.target.id === 'addSocialBtn') {
            addMoreSocial(event);
            $("#totalSocial").html(socialCount);
        }
    });
    function addMoreSocial(event) {
    // Create new social media inputs
        event.preventDefault(); // Prevent default button behavior
        var socialContainer = document.getElementById('social');
        var newSocialInput = document.createElement('div');
        newSocialInput.id = "media";
        newSocialInput.innerHTML = `
            <select class="form-control" style="width: 15%; line-height: 20px;" id="social_${socialCount}" >
                <option value="Facebook">Facebook</option>
                <option value="Youtube">Youtube</option>
                <option value="Instagram">Instagram</option>
                <option value="Whatsapp">Whatsapp</option>
                <option value="Snapchat">Snapchat</option>
                <option value="Twitter">Twitter</option>
            </select>
            <input type="text" class="form-control" id="url_${socialCount}" value="" placeholder="Enter Url ...">
        `;
        var removeButtons = document.querySelectorAll('#removeSocialBtn');
        removeButtons.forEach(function(button) {
            button.remove();
        });
        if (socialCount > 0) {
            var removeBtn = document.createElement('a');
            removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'remove-btn');
            removeBtn.id="removeSocialBtn";
            removeBtn.innerHTML = 'x';
            removeBtn.href = 'javascript:void(0);';
            removeBtn.onclick = function() {
                removeSocial(this);
            };
            newSocialInput.appendChild(removeBtn);
        }
        // Append the new social media input to the container
        socialContainer.appendChild(newSocialInput);
        socialCount++; 
    }
    
    function removeSocial(button) {
        // Remove the corresponding social media input
        // var socialInput = button.parentElement;
        // socialInput.remove();
        socialCount--;        
        $("#totalSocial").html(socialCount);
        console.log(socialCount,"socialCountsocialCountsocialCountsocialCount");
            // Get all social media input containers
        var socialInputs = document.querySelectorAll('#social'); 
        var mediaInputs = document.querySelectorAll('#media');
        // Check if there's more than one social media input
        if (mediaInputs.length > 0) {
            // Get the last social media input container
            var lastSocialInput = mediaInputs[mediaInputs.length - 1];
            // Remove the last social media input container
 
            lastSocialInput.remove();
            // Decrement the social count

            var removeBtn = document.createElement('a');
            removeBtn.href = "javascript:void(0);";
            removeBtn.id="removeSocialBtn";
            removeBtn.onclick = function() { removeSocial(lastSocialInput); };
            removeBtn.classList.add('btn', 'btn-sm', 'btn-danger');
            removeBtn.style.fontSize = '18px';
            removeBtn.style.borderRadius = '5px';
            removeBtn.style.padding = '2px 13px 1px 12px';
            removeBtn.textContent = 'x';
            var lastSocialInput = mediaInputs[mediaInputs.length - 2];
            if (mediaInputs.length === 2) {
                var removeButtons = document.querySelectorAll('#removeSocialBtn');
                removeButtons.forEach(function(button) {
                    button.remove();
                });
            }else{
                lastSocialInput.appendChild(removeBtn);
            }
            
        } else {
            alert("You can't remove the only social media input.");
        }
    }
    document.getElementById('headerLogo').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgPreview = document.getElementById('headerLogoPreview');
            imgPreview.src = reader.result;
            imgPreview.style.display = 'block'; // Show the image preview
        };

        // Read the selected file as a data URL
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    });
    document.getElementById('footerLogo').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgPreview = document.getElementById('footerLogoPreview');
            imgPreview.src = reader.result;
            imgPreview.style.display = 'block'; // Show the image preview
        };

        // Read the selected file as a data URL
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    });
    document.getElementById('favicon').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imgPreview = document.getElementById('faviconPreview');
            imgPreview.src = reader.result;
            imgPreview.style.display = 'block'; // Show the image preview
        };

        // Read the selected file as a data URL
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
@endpush
