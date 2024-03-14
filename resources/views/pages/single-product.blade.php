@extends('components.app')
@section('title', 'Patakah')
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

    <div class="main-content d-flex flex-wrap padding-large">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="post-meta">
              <span class="post-date">{{$product->category}}</span> / {{$product->subcategory}}</a>
            </div>
            <div class="feature-image d-flex justify-content-center">
              <img id="imageUrl" src="{{asset('images/products/' . $product->featured_img)}}" alt="post image" class="jarallax-img">
            </div>
          </div>
          <div class="col-md-6">
            <h1 class="page-title">{{$product->name}}</h1>
            <div class="post-content">
              <p class="d-flex align-items-center"><strong>Price:</strong> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg><strike><span id="mrp">{{$product->mrp}}</span></strike> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg><span id="price">{{$product->selling}}</span> /-</p>               
            </div>
            <div class="post-content-attribute d-flex align-items-center g-10">
                @if($product->size)
                    <p class="attribute-text"><strong>Size:</strong></p> 
                    <a href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}" class="btn attribute-btn ">{{$product->size}}</a>              
                @endif
                @if($product->sizeArray)
                    @foreach(json_decode($product->sizeArray) as $size)
                        <a href="?size={{$size->size}}" id="attribute_{{$size->size}}" class="btn attribute-btn attribute-btn-inActive">{{$size->size}}</a>     
                    @endforeach
                @endif 
            </div>
            <!-- <div class="post-content-attribute d-flex align-items-center g-10">
                <p class="attribute-text"><strong>Qty:</strong></p>  
                <input  id="productQty"  type="number" min="1" max="5" value="1">
            </div> -->

            <p id="selected_size" style="opacity:0;">{{$product->size}}</p>
              <hr>
            <div class="post-content "> 
                <h3>Short Description:</h3>
                <p>{{$product->short_Desc}}</p>
            </div>
              <hr>
            <div class="post-content "> 
                <h3>Detailed Description:</h3>
                <p>{!! $product->desc !!}</p>
            </div>
            <div class="post-tags">
                <div class="block-tag">
                  <ul class="list-unstyled d-flex">
                    <li>
                        @if($is_availabe_in_cart)
                            <a href="{{route('cart.index')}}"  class="btn btn-dark btn-small btn-rounded">Go to cart</a>
                            @else
                            <a href="javascript:void(0)" onclick="addToCart({{$product->id}})" class="btn btn-dark btn-small btn-rounded">Add to cart</a>
                        @endif
                      
                    </li> 
                  </ul>
                </div>
              </div>
            <!-- <div id="single-post-navigation">
              <hr>
              <div class="row post-navigation d-flex flex-wrap align-items-center justify-content-between">
                <a itemprop="url" class="col-md-6 post-prev d-flex" href="#" title="Previous Post">
                  <span>Previous</span>
                  <h3 class="page-nav-title">Latest trends of wearing street wears supremely</h3>
                </a>
                <a itemprop="url" class="col-md-6 post-next d-flex" href="#" title="Next Post">
                  <span>Next</span>
                  <h3 class="page-nav-title">Types of comfortable clothes ideas for women</h3>
                </a>
              </div>
              <hr>
            </div> -->
          </div>
        </div>
      </div>
    </div>
 
</div>

@endsection