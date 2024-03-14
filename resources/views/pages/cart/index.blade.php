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
                            <div class="card">
                                <h4><span>Cart (</span><span>{{count($cartItems)}}</span><span> items)</span> </h4>
                                @foreach($cartItems as $item)                                
                                    <div class="mt-2 store-item bottom-line pb-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img class="image-store"
                                                    src="{{$item->image}}"
                                                    alt="Blue Hoodie">
                                            </div> 
                                            <div class="col-lg-9">
                                                <div class="mt-3 mt-lg-0 d-flex align-items-center justify-content-between">
                                                    <h4>{{$item->product->name}}</h4>
                                                    <div>
                                                        <div class="btn-quantity-container d-flex align-items-center justify-content-center" style="gap:.5rem;">
                                                            <button type="button" class="btn-quantity btn btn-default decrement" data-price="{{$item->price}}">−</button>
                                                            <span class="p-quantiry">1</span>
                                                            <button type="button" class="btn-quantity btn btn-default increment" data-price="{{$item->price}}">+</button>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <p><span>Size : </span><span>{{$item->size}}</span></p>
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
                                                    <p class="p-total"></p>
                                                </div>
                                            </div>
                                            <div class="mt-1 row">
                                                <div class="">
                                                    <button type="button" class="w-100 btn btn-md btn-primary btn-block">
                                                        Go To Checkout
                                                    </button>
                                                </div>
                                            </div>
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
<script>
    $(document).ready(function(){
        let sum = 0;
        document.querySelectorAll("#price").forEach(function(element){
            sum = sum + parseFloat(element.textContent);
        });
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

    });
</script>
@endsection