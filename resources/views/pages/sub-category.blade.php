@extends('components.app')
@section('title', 'Patakah | Login')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
<style>
    .login-form{
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #dfdbdb2e;
        border-radius: 10px;
        box-shadow: 1px 2px 13px #ccc;
        margin: 50px;
        margin-bottom: 100px;
    }
    .text-red{
        color: red;
        font-weight: 600;
    }
</style>
<div class="container" style="margin-bottom:100px;">
        <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
          <h2 class="section-title">
                @if(count($categories) > 0)

                    @foreach($categories as $category)
                        @if($category->subcategories)
                            @foreach($category->subcategories as $item)
                                @if($item->slug == $slug)
                                    {{$item->title}}
                                @endif
                            @endforeach

                        @endif
                    @endforeach
                @endif
          </h2>         
        </div>   
        @if(count($products)>0)
            <div class="row" style="margin-bottom:25px;">
                @foreach($products as $product)
                    @if($product->is_active)
                    <div class="col-sm-3">
                        <div class="product-item">
                        <div class="image-holder">
                            <img src="{{asset('images/products/' . $product->featured_img)}}" alt="Books" class="product-image">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-center align-items-center">
                            <button type="button" class="btn-wrap cart-link d-flex align-items-center">add to cart <i class="icon icon-arrow-io"></i>
                            </button>
                            <!-- <button type="button" class="view-btn tooltip
                                d-flex">
                                <i class="icon icon-screen-full"></i>
                                <span class="tooltip-text">Quick view</span>
                            </button>
                            <button type="button" class="wishlist-btn">
                                <i class="icon icon-heart"></i>
                            </button> -->
                            </div>
                        </div>
                        <div class="product-detail">
                            <h3 class="product-title">
                            <a href="single-product.html">{{$product->name}}</a>
                            </h3>
                            <span class="item-price text-primary"><strike><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->mrp}}</strike></span>
                            <span class="item-price text-primary"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->selling}}/-</span>
                        </div>
                        </div>
                    </div> 
                    @endif
                @endforeach
            </div>
        @else
        <h5 class="widget-title"><center>There are no products available related to this category.</center></h5>
    @endif
</div>
 
@endsection