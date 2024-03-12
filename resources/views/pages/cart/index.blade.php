@extends('components.app')
@section('title', 'succu | Login')
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
    object-fit: cover;
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
                                                    src="https://images.unsplash.com/photo-1617171594202-100a53bdfe04?crop=entropy&amp;cs=srgb&amp;fm=jpg&amp;ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2OTA4NjE0MjN8&amp;ixlib=rb-4.0.3&amp;q=85"
                                                    alt="Blue Hoodie">
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="mt-3 mt-lg-0 d-flex align-items-center justify-content-between">
                                                    <h4>Blue Hoodie</h4>
                                                    <div>
                                                        <div class="btn-quantity-container d-flex align-items-center justify-content-center" style="gap:.5rem;">
                                                            <button type="button" class="btn-quantity btn btn-default">−</button>
                                                            <span class="p-quantiry">1</span>
                                                            <button type="button" class="btn-quantity btn btn-default">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <p>Hodie-B</p>
                                                    <p class="p-note"></span></p>
                                                </div>
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <p><span>Color : </span><span>Blue</span></p>
                                                </div>
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <p><span>Size : </span><span>M</span></p>
                                                </div>
                                                <div class="list-store d-flex align-items-center justify-content-between">
                                                    <div class="d-flex gap-2">
                                                        <button type="button" class="btn-list btn btn-xs btn-default">
                                                            <i class="fa fa-trash"></i>
                                                            <span> Remove Item</span>
                                                        </button> 
                                                    </div>
                                                    <div class="d-flex">
                                                        <h5>$17.99</h5>
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
                                                        <p>Temporary amount</p>
                                                        <p>$0.00</p>
                                                    </div>
                                                    <div class="list-store d-flex align-items-center justify-content-between">
                                                        <p>Shipping</p>
                                                        <p>Gratis</p>
                                                    </div>
                                                    <div class="bottom-line"></div>
                                                </div>
                                            </div>
                                            <div class="mt-2 row">
                                                <div class="col-6">
                                                    <p class="p-total-label">The total amount of (Including VAT)</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="p-total">$0.00</p>
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
                                <div class="" >
                                    <div class="card" >
                                        <div class="d-flex align-items-center justify-content-between" >
                                            <p >Add a discount code (optional)</p>
                                            <p ><i class="fa fa-chevron-down"></i></p>
                                        </div>
                                    </div>
                                </div>
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

@endsection