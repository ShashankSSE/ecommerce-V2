@extends('components.app')
@section('title', 'Patakah | Login')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
<style>
.login-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #dfdbdb2e;
    border-radius: 10px;
    box-shadow: 1px 2px 13px #ccc;
    margin: 50px;
    margin-bottom: 100px;
}

.text-red {
    color: red;
    font-weight: 600;
}

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 16px;
    position: relative;
    background-color: #fff;
    border-radius: 5px;
    border: 1px solid #edebeb;
    -webkit-transition: -webkit-box-shadow 0.25s;
    transition: -webkit-box-shadow 0.25s;
    transition: box-shadow 0.25s;
    transition: box-shadow 0.25s, -webkit-box-shadow 0.25s;
}

/* store item component */
.store-item {
    padding:10px;
}

.store-item .image-store {
    width: 100%;
    height: 170px;
    object-fit: contain;
    border-radius: 8px;
}

.store-item .list-store p {
    font-size: 14px;
    font-weight: 400;
    line-height: 0.9;
}

.store-item .list-store .p-note {
    font-size: 11px;
    color: #828282;
    transform: translatex(-25%);
    margin-top: 5px;
}

.store-item .list-store .btn-list {
    border: 1px solid #edebeb;
    font-size: 14px;
    font-weight: 500;
}

.store-item .list-store .btn-list:active {
    border: 1px solid #757574;
}

.store-item .btn-quantity-container {
    border: 1px solid #edebeb;
    border-radius: 6px;
    height: 35px;
}

.store-item .btn-quantity-container .btn-quantity {
    font-size: 18px;
    font-weight: 500;
    height: 100%;
    padding-top: 0;
    padding-bottom: 0;
}

.store-item .p-total-label {
    font-size: 14px;
    font-weight: 500;
}

.store-item .p-total {
    font-size: 14px;
    font-weight: 500;
    text-align: right;
}

.bottom-line {
    width: 100%;
    border-bottom: 1px solid #edebeb;
}
.p-quantiry{
    width: 40px;
    text-align: center;
}
</style>
<div class="container" style="margin-bottom:100px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="pt-4 pb-4 container">
                <h2 class="text-center">Shopping Cart</h2>
                @if($cartItems)
                    <div class="mt-5 gap-3 gap-md-0 gap-lg-0 row">
                        <div class="col-lg-8 col-md-7">
                            <div class="card" id="cart_items">
                                <h4><span>Cart (</span><span>{{count($cartItems)}}</span><span> items)</span> </h4>
                                @foreach($cartItems as $item)           
                                    <div class="mt-2 store-item bottom-line pb-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img id="product_img" class="image-store"
                                                    src="{{$item->image}}"
                                                    alt="Blue Hoodie">
                                            </div> 
                                            <div class="col-lg-9">
                                                <div class="mt-3 mt-lg-0 d-flex align-items-center justify-content-between">
                                                    <h4 id="product_name">{{$item->product->name}}</h4>
                                                    <h4 id="product_id" style="opacity: 0;">{{$item->product->id}}</h4>
                                                    <h4 id="cart_id" style="opacity:0;">{{$item->id}}</h4>
                                                    <div>
                                                        <div class="btn-quantity-container d-flex align-items-center justify-content-center" style="gap:.5rem;">
                                                            <button type="button" class="btn-quantity btn btn-default decrement" data-price="{{$item->price}}">−</button>
                                                            <span class="p-quantiry" id="product_qty">1</span>
                                                            <button type="button" class="btn-quantity btn btn-default increment" data-price="{{$item->price}}">+</button>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="list-store ">
                                                    
                                                    <p><span>Size : </span><span id="product_size">{{json_decode($item->size)->size}}</span></p>
                                                    <p><span>Color : </span><span id="product_color">{{json_decode($item->size)->color}}</span></p>
                                                </div>
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <div class="d-flex gap-2">
                                                        <a href="{{route('cart.removeFromCart', ['id' => $item->id])}}" class="btn-list btn btn-xs btn-default">
                                                            <i class="fa fa-trash"></i>
                                                            <span> Remove Item</span>
                                                        </a> 
                                                    </div>
                                                    <div class="d-flex">
                                                        <h5><strike style="    display: flex;color: #ccc;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#ccc" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$item->mrp}}</strike></h5>
                                                        <h5 style="    display: flex;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg><span id="price">{{$item->price}}</span>/-</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <div class="gap-3 row">
                                <div class="">
                                    <div class="card">
                                        <h4>The total amount of</h4>
                                        <div class="store-item mt-2">
                                            <div class="row">
                                                <div class="">
                                                    <div class="list-store d-flex align-items-center justify-content-between">
                                                        <p >Temporary amount</p>
                                                        <div class="d-flex align-items-center">
                                                            <span style="margin-top:-10px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#ccc" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg></span>
                                                            <p id="temporaryAmount">$0.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="list-store d-flex align-items-center justify-content-between">
                                                        <p>Delivery Fee</p>
                                                        <p></p>
                                                    </div>
                                                    <div class="bottom-line"></div>
                                                </div>
                                            </div>
                                            <div class="mt-2 row">
                                                <div class="col-6">
                                                    <p class="p-total-label">The total amount of (Including GST 18%)</p>
                                                </div>
                                                <div class="col-6 d-flex align-items-center justify-content-end">
                                                <span style="margin-top:-10px;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#ccc" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg></span>
                                                    <p class="p-total" id="total_amount"></p>
                                                </div>
                                            </div>
                                            <form id="generateOrderForm">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input  style="width:100%;     font-size: 14px;" type="text" class="form-control" value="{{$user->name}}" name="name" id="name" disabled>
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input  style="width:100%;     font-size: 14px;" type="text" class="form-control" value="{{$userInfo ? $userInfo->city : ''}}" name="city" id="city" required>
                                                        </div> 
                                                    </div>
                                                    <div class="col-sm-6"> 
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input  style="width:100%;     font-size: 14px;" type="text" class="form-control" value="{{$user->email}}"  name="email" id="email" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                            <input  style="width:100%;     font-size: 14px;" type="text" class="form-control" value="{{$userInfo ? $userInfo->state : ''}}" name="state" id="state" required>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="pin">Pin</label>
                                                            <input  style="width:100%;     font-size: 14px;" type="number" class="form-control" value="{{$userInfo ? $userInfo->pin : ''}}" name="pin" id="pin" required oninput="javascript: if (this.value.length > 6) this.value = this.value.slice(0, 6);">
                                                        </div> 
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <textarea  style="width:100%;     font-size: 14px;" type="text" class="form-control" name="address" id="address" required>{{$userInfo ? $userInfo->address : ''}}</textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="mt-1 row">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="w-100 btn btn-md btn-primary btn-block">
                                                            Place your Order
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="" >
                                    <div class="card" >
                                        <div class="d-flex align-items-center justify-content-between" >
                                            <p >Add a discount code (optional)</p>
                                            <p ><i class="fa fa-chevron-down"></i></p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                @else
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <h4><span>Cart (</span><span>0</span><span> items)</span> </h4>
                        <div class="mt-2 store-item bottom-line pb-3">
                            <div class="row">
                                <div class="col-lg-3"> 
                                </div>
                                <div class="col-lg-9">
                                    
                                    Your Cart is Empty.
                                
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
 
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    
    $(document).ready(function(){

        let sum = 0;
        document.querySelectorAll("#price").forEach(function(element){
            sum = sum + parseFloat(element.textContent);
        });
        if(sum == 0){
            $("#generateOrderForm").hide();
        }
        $("#temporaryAmount").text(sum);
        var withGst = sum * (18/100);
        var totalWithGst = withGst + sum;
        $(".p-total").text(totalWithGst);
        document.querySelectorAll('.btn-quantity').forEach(function(button) {
            button.addEventListener('click', function() {
                var quantityElement = this.parentElement.querySelector('.p-quantiry');
                var quantity = parseInt(quantityElement.innerText);        
                if (this.classList.contains('increment') && quantity < 5) {
                    quantityElement.innerText = (quantity + 1).toString();
                    var price = parseInt($(this).data('price'));
                    sum = sum + price;
                    $("#temporaryAmount").text(sum);
                    var withGst = sum * (18/100);
                    var totalWithGst = withGst + sum;
                    console.log(withGst);
                    $(".p-total").text(totalWithGst); 
                } else if (this.classList.contains('decrement') && quantity > 1) {
                    quantityElement.innerText = (quantity - 1).toString();
                    var price = parseInt($(this).data('price'));
                    sum = sum - price;
                    $("#temporaryAmount").text(sum);
                    var withGst = sum * (18/100);
                    var totalWithGst = withGst + sum;
                    $(".p-total").text(totalWithGst); 
                }
            });
        });

        $('#generateOrderForm').submit(function (e) { 
            e.preventDefault();
            // Basic form validation
            var cartItems = getCartItems();
            var formData = new FormData();

            var csrfToken = "{{ csrf_token() }}";
            formData.append('_token', csrfToken);
            // Append each product object to the FormData object
            cartItems.forEach(function(product, index) {
                formData.append('cartItems[' + index + '][cartId]', product.cartId);
                formData.append('cartItems[' + index + '][productId]', product.productId);
                formData.append('cartItems[' + index + '][name]', product.name);
                formData.append('cartItems[' + index + '][img]', product.img);
                formData.append('cartItems[' + index + '][qty]', product.qty);
                formData.append('cartItems[' + index + '][size]', product.size);
                formData.append('cartItems[' + index + '][color]', product.color);
                formData.append('cartItems[' + index + '][price]', product.price);
            });
            formData.append('amount',parseFloat($("#total_amount").text()));
            formData.append('name', $("#name").val());
            formData.append('email', $("#email").val());
            formData.append('city', $("#city").val());
            formData.append('state', $("#state").val());
            formData.append('pin', $("#pin").val());
            formData.append('address', $("#address").val());
            $("#error").hide();
            $.ajax({
                url: '{{route("order.index")}}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response,"asdfasdfsadfsadfsafs"); // You can replace this with any other action
                    if(response.status){
                        var successUrl = "{{route('payment.success')}}";
                        var options = {
                            "key": response.details.key, // Enter the Key ID generated from the Dashboard
                            "amount": response.order.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": response.details.currency,
                            "name": response.details.name,
                            "description": "Test Transaction",
                            "image": response.details.logo,
                            "order_id": response.order.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function (response){
                                // console.log(response)
                                // console.log(response.razorpay_payment_id);
                                // console.log(response.razorpay_order_id);
                                // console.log(response.razorpay_signature)
                                window.location.href = successUrl+'?payment_id='+response.razorpay_payment_id+'&order_id='+response.razorpay_order_id;
                            },
                            "prefill": {
                                "name": response.details.name,
                                "email": response.details.email,
                                "contact": response.details.contact,
                            },
                            "notes": {
                                "address": "Razorpay Corporate Office"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response){
                                // alert(response.error.code);
                                // alert(response.error.description);
                                // alert(response.error.source);
                                // alert(response.error.step);
                                // alert(response.error.reason);
                                // alert(response.error.metadata.order_id);
                                // alert(response.error.metadata.payment_id);
                                window.location.href = successUrl+'?payment_id='+response.error.metadata.payment_id+'&order_id='+response.error.metadata.order_id;

                        });
                        // document.getElementById('rzp-button1').onclick = function(e){
                            rzp1.open();
                            // e.preventDefault();
                        // }
                    }else{
                        Swal.fire({
                            title: "Failed!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    });


    function getCartItems(){ 
        const cartItems = document.querySelectorAll('#cart_items .store-item');
        const products = [];
        cartItems.forEach(cartItem => {
            // Get product name
            const productId = cartItem.querySelector('#product_id').innerText.trim();
            const productName = cartItem.querySelector('#product_name').innerText.trim();
            const cartId = cartItem.querySelector('#cart_id').innerText.trim();
            
            // Get product image URL
            const productImg = cartItem.querySelector('#product_img').getAttribute('src');

            // Get product quantity
            const productQty = cartItem.querySelector('#product_qty').innerText.trim();

            // Get product size
            const productSize = cartItem.querySelector('#product_size').innerText.trim();

            // Get product color
            // const productSize = cartItem.querySelector('#product_color').innerText.trim();
            const productColor = cartItem.querySelector('#product_color').innerText.trim();

            // Get product price
            const productPrice = cartItem.querySelector('#price').innerText.trim();

            // Construct product object
            const product = {
                cartId: cartId,
                productId:productId,
                name: productName,
                img: productImg,
                qty: productQty,
                size: productSize,
                color:productColor,
                price: productPrice
            };

            // Push product object to products array
            products.push(product);
        });
        return products; 
    }
</script>
@endsection