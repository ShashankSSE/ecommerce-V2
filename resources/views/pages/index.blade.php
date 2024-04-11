@extends('components.app')
@section('title', 'Patakha')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')

<section id="billboard" class="overflow-hidden">

      <button class="button-prev">
        <i class="icon icon-chevron-left"></i>
      </button>
      <button class="button-next">
        <i class="icon icon-chevron-right"></i>
      </button>
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
        @if(count($banners)>0)
            @foreach($banners as $banner)
              <div class="swiper-slide" style="background-image: url('{{$banner->image}}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                <div class="banner-content">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6">
                        <h2 class="banner-title">{{$banner->title}}</h2>
                        <p>{{$banner->text}}</p>
                        @if($banner->url)
                        <div class="btn-wrap">
                          <a href="{{$banner->url}}" class="btn btn-light btn-medium d-flex align-items-center" tabindex="0">Shop it now <i class="icon icon-arrow-io"></i>
                          </a>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </section>

    <section id="featured-products" class="product-store padding-large">
      <div class="container">

        <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
          <h2 class="section-title">Featured Products</h2>            
          <div class="btn-wrap">
            <a href="shop.html" class="d-flex align-items-center">View all products <i class="icon icon icon-arrow-io"></i></a>
          </div>            
        </div>
        <div class="swiper product-swiper overflow-hidden">          
          <div class="swiper-wrapper">
            @foreach($products as $product)
            @if($product->is_featured && $product->is_active)
              <div class="swiper-slide">
                <div class="product-item">
                  <div class="image-holder">
                    <img src="{{asset('images/products/' . $product->featured_img)}}" alt="Books" class="product-image">
                  </div>
                  <div class="cart-concern">
                    <div class="cart-button d-flex justify-content-between align-items-center">
                      <!-- @if(in_array($product->id, $cartItem) && auth()->user())
                        <a href="{{route('cart.index')}}"  class="btn-wrap cart-link d-flex align-items-center">Go to cart <i class="icon icon-arrow-io"></i></a>
                          @else
                          <button type="button"  onclick="addToCart({{$product->id}})" class="btn-wrap cart-link d-flex align-items-center">Add to cart <i class="icon icon-arrow-io"></i></button>
                      @endif -->
                      <a href="{{route('frontend.singleProduct.index', ['slug' => $product->slug]) }}"  class="btn-wrap cart-link d-flex align-items-center">View product <i class="icon icon-arrow-io"></i></a>
                      <a href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}" class="view-btn tooltip d-flex">
                          
                        <i class="icon icon-screen-full"></i>
                        <span class="tooltip-text">Quick view</span>
                      </a>
                      <!-- <button type="button" class="wishlist-btn">
                        <i class="icon icon-heart"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="product-detail">
                    <h3 class="product-title">
                      <a href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}">{{$product->name}}</a>
                    </h3>
                    <span class="item-price text-primary"><strike><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->mrp}}</strike></span>
                    <span class="item-price text-primary"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->selling}}/-</span>
                  </div>
                </div>
              </div> 
            @endif
            @endforeach

          </div>
        </div> 
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <section id="latest-collection">
      <div class="container">
        <div class="product-collection row">
          <div class="col-lg-7 col-md-12 left-content">
            <div class="collection-item">
              <div class="products-thumb">
                <img src="{{asset('assets/frontend/images/collection-item1.jpg')}}" alt="collection item" class="large-image image-rounded">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
                <div class="categories">casual collection</div>
                <h3 class="item-title">street wear.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                <div class="btn-wrap">
                  <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 right-content flex-wrap">
            <div class="collection-item top-item">
              <div class="products-thumb">
                <img src="{{asset('assets/frontend/images/collection-item2.jpg')}}" alt="collection item" class="small-image image-rounded">
              </div>
              <div class="col-md-6 product-entry">
                <div class="categories">Basic Collection</div>
                <h3 class="item-title">Basic shoes.</h3>
                <div class="btn-wrap">
                  <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="collection-item bottom-item">
              <div class="products-thumb">
                <img src="{{asset('assets/frontend/images/collection-item3.jpg')}}" alt="collection item" class="small-image image-rounded">
              </div>
              <div class="col-md-6 product-entry">
                <div class="categories">Best Selling Product</div>
                <h3 class="item-title">woolen hat.</h3>
                <div class="btn-wrap">
                  <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="subscribe" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="block-text col-md-6">
            <div class="section-header">
              <h2 class="section-title">Get 25% off Discount Coupons</h2>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst amet, metus, sit massa posuere maecenas. At tellus ut nunc amet vel egestas.</p>
          </div>
          <div class="subscribe-content col-md-6">
            <form id="form" class="d-flex justify-content-between">
              <input type="text" name="email" placeholder="Enter your email addresss here">
              <button class="btn btn-dark">Subscribe Now</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section id="selling-products" class="product-store bg-light-grey padding-large">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Best selling products</h2>
        </div>
        @if(count($categories) > 0)
          <ul class="tabs list-unstyled">
            <li data-tab-target="#all" class="active tab">All</li>
            @foreach($categories as $category)
              <li data-tab-target="#{{$category->slug}}" class="tab">{{$category->name}}</li>
            @endforeach
          </ul>        
        @endif
        @if(count($products) > 0)
        <div class="tab-content">
          <div id="all" data-tab-content class="active">
            <div class="row d-flex flex-wrap">
              @foreach($products as $product)
                <div class="product-item col-lg-3 col-md-6 col-sm-6">
                  <div class="image-holder">
                    <img src="{{asset('images/products/' . $product->featured_img)}}" alt="Books" class="product-image">
                  </div>
                  <div class="cart-concern">
                    <div class="cart-button d-flex justify-content-between align-items-center">  
                      @if(in_array($product->id, $cartItem))
                        <a href="{{route('cart.index')}}"  class="btn-wrap cart-link d-flex align-items-center">Go to cart <i class="icon icon-arrow-io"></i></a>
                          @else
                          <a  href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}" class="btn-wrap cart-link d-flex align-items-center">View Product <i class="icon icon-arrow-io"></i></a>
                      @endif 
                      <a href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}" class="view-btn tooltip
                          d-flex">
                        <i class="icon icon-screen-full"></i>
                        <span class="tooltip-text">Quick view</span>
                      </a>
                      <!-- <button type="button" class="wishlist-btn">
                        <i class="icon icon-heart"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="product-detail">
                    <h3 class="product-title">
                      <a href="{{$product->slug}}">{{$product->name}}</a>
                    </h3>
                    <span class="item-price text-primary"><strike><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->mrp}}</strike></span>
                    <span class="item-price text-primary"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->selling}}/-</span>
                  </div>
                </div>
              @endforeach
              
            </div>
          </div>

          @foreach($products as $product)
            <div id="{{$product->category_slug}}" data-tab-content>
              <div class="row d-flex flex-wrap">
                <div class="product-item col-lg-3 col-md-6 col-sm-6">
                  <div class="image-holder">
                    <img src="{{asset('images/products/' . $product->featured_img)}}" alt="Books" class="product-image">
                  </div>
                  <div class="cart-concern">
                    <div class="cart-button d-flex justify-content-between align-items-center">
                      <button type="button"  onclick="addToCart({{$product->id}})" class="btn-wrap cart-link d-flex align-items-center">add to cart <i class="icon icon-arrow-io"></i>
                      </button>
                      <a href="" class="view-btn tooltip
                          d-flex">
                        <i class="icon icon-screen-full"></i>
                        <span class="tooltip-text">Quick view</span>
                      </a>
                      <!-- <button type="button" class="wishlist-btn">
                        <i class="icon icon-heart"></i>
                      </button> -->
                    </div>
                  </div>
                  <div class="product-detail">
                    <h3 class="product-title">
                      <a href="{{$product->slug}}">{{$product->name}}</a>
                    </h3>
                    <span class="item-price text-primary"><strike><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->mrp}}</strike></span>
                    <span class="item-price text-primary"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->selling}}/-</span>
                  
                  </div>
                </div> 
              </div>
            </div>          
          @endforeach
        </div>
        @endif

      </div>
    </section>

    <section id="testimonials" class="padding-large no-padding-bottom">
      <div class="container">
        <div class="reviews-content">
          <div class="row d-flex flex-wrap">
            <div class="col-md-2">
              <div class="review-icon">
                <i class="icon icon-right-quote"></i>
              </div>
            </div>
            <div class="col-md-8">
              <div class="swiper testimonial-swiper overflow-hidden">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>“Dignissim massa diam elementum habitant fames. Id nullam pellentesque nisi, eget cursus dictumst pharetra, sit. Pulvinar laoreet id porttitor egestas dui urna. Porttitor nibh magna dolor ultrices iaculis sit iaculis.”</p>
                      <div class="author-detail">
                        <div class="name">By Maggie Rio</div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="testimonial-detail">
                      <p>“Dignissim massa diam elementum habitant fames. Id nullam pellentesque nisi, eget cursus dictumst pharetra, sit. Pulvinar laoreet id porttitor egestas dui urna. Porttitor nibh magna dolor ultrices iaculis sit iaculis.”</p>
                      <div class="author-detail">
                        <div class="name">By John Smith</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-arrows">
                <button class="prev-button">
                  <i class="icon icon-arrow-left"></i>
                </button>
                <button class="next-button">
                  <i class="icon icon-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="flash-sales" class="product-store padding-large">
      
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Flash sales</h2>
        </div>
        <div class="swiper product-swiper flash-sales overflow-hidden">

          <div class="swiper-wrapper">

          @foreach($products as $product)
            @if($product->is_flash_sale && $product->is_active)
            <div class="swiper-slide">
              <div class="product-item">
                    <img src="{{asset('images/products/' . $product->featured_img)}}" alt="Books" class="product-image">
                <div class="cart-concern">
                  <div class="cart-button d-flex justify-content-between align-items-center">
                  @if(in_array($product->id, $cartItem))
                        <a href="{{route('cart.index')}}"  class="btn-wrap cart-link d-flex align-items-center">Go to cart <i class="icon icon-arrow-io"></i></a>
                          @else
                          <a  href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}" class="btn-wrap cart-link d-flex align-items-center">View Product <i class="icon icon-arrow-io"></i></a>
                      @endif              
                  </div>
                </div>
                
                <div class="discount">{{number_format((($product->mrp - $product->selling)/$product->mrp) * 100, 2) }}% Off</div>
                <div class="product-detail">
                  <h3 class="product-title">
                      <a href="{{ route('frontend.singleProduct.index', ['slug' => $product->slug]) }}">{{$product->name}}</a>
                  </h3>
                  <div class="item-price text-primary">
                    <del class="prev-price"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->mrp}}</del><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="25" height="20"  viewBox="0 0 224 448"><title></title><g id="icomoon-ignore"></g><path fill="#000" d="M224.5 117.5v25.5c0 4.5-3.5 8-8 8h-42c-7.75 48-44.5 79.25-101.25 86 37.25 39.75 77 87.75 114.75 134 2 2.25 2.5 5.75 1 8.5-1.25 2.75-4 4.5-7.25 4.5h-48.75c-2.5 0-4.75-1-6.25-3-40.25-48.25-77.25-92.5-124.5-142.75-1.5-1.5-2.25-3.5-2.25-5.5v-31.75c0-4.25 3.5-8 8-8h28c44 0 71.5-14.75 78.75-42h-106.75c-4.5 0-8-3.5-8-8v-25.5c0-4.5 3.5-8 8-8h103.25c-9.5-18.75-32-28.25-67-28.25h-36.25c-4.5 0-8-3.75-8-8v-33.25c0-4.5 3.5-8 8-8h208c4.5 0 8 3.5 8 8v25.5c0 4.5-3.5 8-8 8h-58.25c8 10.25 13.25 22.25 16 36h42.75c4.5 0 8 3.5 8 8z"></path></svg>{{$product->selling}}
                  </div>
                </div>
              </div>
            </div> 
            @endif
          @endforeach
          </div>
          <div class="swiper-pagination"></div>

        </div>
      </div>
    </section>

    <section class="shoppify-section-banner">
      <div class="container">
        <div class="product-collection">
          <div class="left-content collection-item">
            <div class="products-thumb">
              <img src="{{asset('assets/frontend/images/model.jpg')}}" alt="collection item" class="large-image image-rounded">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
              <div class="categories">Denim collection</div>
              <h3 class="item-title">The casual selection.</h3>
              <p>Vel non viverra ligula odio ornare turpis mauris. Odio aliquam, tincidunt ut vitae elit risus. Tempor egestas condimentum et ac rutrum dui, odio.</p>
              <div class="btn-wrap">
                <a href="shop.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
                </a>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </section>

    <section id="quotation" class="align-center padding-large">
      <div class="inner-content">
        <h2 class="section-title divider">Quote of the day</h2>
        <blockquote>
          <q>It's true, I don't like the whole cutoff-shorts-and-T-shirt look, but I think you can look fantastic in casual clothes.</q>
          <div class="author-name">- Dr. Seuss</div>
        </blockquote>
      </div>
    </section>

    <hr>
    <section id="latest-blog" class="padding-large">
      <div class="container">
        <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
          <h2 class="section-title">our Journal</h2>
          <div class="btn-wrap align-right">
            <a href="blog.html" class="d-flex align-items-center">Read All Articles <i class="icon icon icon-arrow-io"></i>
            </a>
          </div>
        </div>
        <div class="row d-flex flex-wrap">
          <article class="col-md-4 post-item">
            <div class="image-holder zoom-effect">
              <a href="single-post.html">
                <img src="{{asset('assets/frontend/images/post-img1.jpg')}}" alt="post" class="post-image">
              </a>
            </div>
            <div class="post-content d-flex">
              <div class="meta-date">
                <div class="meta-day text-primary">22</div>
                <div class="meta-month">Aug-2021</div>
              </div>
              <div class="post-header">
                <h3 class="post-title">
                  <a href="single-post.html">top 10 casual look ideas to dress up your kids</a>
                </h3>
                <a href="blog.html" class="blog-categories">Fashion</a>
              </div>
            </div>
          </article>
          <article class="col-md-4 post-item">
            <div class="image-holder zoom-effect">
              <a href="single-post.html">
                <img src="{{asset('assets/frontend/images/post-img2.jpg')}}" alt="post" class="post-image">
              </a>
            </div>
            <div class="post-content d-flex">
              <div class="meta-date">
                <div class="meta-day text-primary">25</div>
                <div class="meta-month">Aug-2021</div>
              </div>
              <div class="post-header">
                <h3 class="post-title">
                  <a href="single-post.html">Latest trends of wearing street wears supremely</a>
                </h3>
                <a href="blog.html" class="blog-categories">Trending</a>
              </div>
            </div>
          </article>
          <article class="col-md-4 post-item">
            <div class="image-holder zoom-effect">
              <a href="single-post.html">
                <img src="{{asset('assets/frontend/images/post-img3.jpg')}}" alt="post" class="post-image">
              </a>
            </div>
            <div class="post-content d-flex">
              <div class="meta-date">
                <div class="meta-day text-primary">28</div>
                <div class="meta-month">Aug-2021</div>
              </div>
              <div class="post-header">
                <h3 class="post-title">
                  <a href="single-post.html">types of comfortable clothes ideas for women</a>
                </h3>
                <a href="blog.html" class="blog-categories">Inspiration</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section id="brand-collection" class="padding-medium bg-light-grey">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between">
          <img src="{{asset('assets/frontend/images/brand1.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('assets/frontend/images/brand2.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('assets/frontend/images/brand3.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('assets/frontend/images/brand4.png')}}" alt="phone" class="brand-image">
          <img src="{{asset('assets/frontend/images/brand5.png')}}" alt="phone" class="brand-image">
        </div>
      </div>
    </section>

    <section id="instagram" class="padding-large">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Follow our instagram</h2>
        </div>
        <p>Our official Instagram account <a href="#">@ultras</a> or <a href="#">#ultras_clothing</a>
        </p>
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image1.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image2.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image3.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image4.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image5.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
          <div class="col-lg-2 col-md-4 col-sm-6">
            <figure class="zoom-effect">
              <img src="{{asset('assets/frontend/images/insta-image6.jpg')}}" alt="instagram" class="insta-image">
              <i class="icon icon-instagram"></i>
            </figure>
          </div>
        </div>          
      </div>
    </section>

    <section id="shipping-information">
      <hr>
      <div class="container">
        <div class="row d-flex flex-wrap align-items-center justify-content-between">
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-truck"></i>
              <h4 class="block-title">
                <strong>Free shipping</strong> Over $200
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-return"></i>
              <h4 class="block-title">
                <strong>Money back</strong> Return within 7 days
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-tags1"></i>
              <h4 class="block-title">
                <strong>Buy 4 get 5th</strong> 50% off
              </h4>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box">
              <i class="icon icon-help_outline"></i>
              <h4 class="block-title">
                <strong>Any questions?</strong> experts are ready
              </h4>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </section>

@endsection