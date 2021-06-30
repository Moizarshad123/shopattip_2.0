@extends('layouts.homePageMaster')
@section('customStyle')
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<style></style>
@endsection

@section('content')
<section>
    <!-- categories section 1-->
    <br>

    <!-- heading -->
    <section class="categorie-section" style="margin-top: 60px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <div class="categorie-column categorie-col-100 categorie-inner-column">
                    <div class="categorie-column-wrap categorie-element-populated">
                        <div
                            class="categorie-element categorie-element-98344ab text-block-wapper-5 categorie-widget categorie-widget-heading">
                            <div class="categorie-widget-container">
                                <h2 class="categorie-heading-title">
                                    New Arrivals
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- slider -->
    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
         
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        @foreach ($newArrivals as $newArrival)
                        <div class="swiper-slide" style="margin-right: 40px;">
                            <div class="slider-box">
                             @if($newArrival->created_at > Carbon\Carbon::now()->startOfWeek())
                                <p class="time">New</p>
                            @endif
                                <div class="img-box">
                                    <img src="{{ asset('website/productImages/') }}/product_{{ $newArrival->id }}_1.jpg">
                                </div>

                                <p class="detail">{{ $newArrival->name }}

                                    <a href="#" class="price"> Rs.{{ number_format($newArrival->sale_price,2) }}</a>
                                </p>
                                <div class="cart">
                                    <a href="javascript:void(0)"  class="add-to-cart" id="add-to-cart" data-product_id="{{ $newArrival->id }}">Add To Cart</a>
                                </div>
                               
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--swiper  slider end-->
            </div>
           
        </div>
    </section>

    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        <div class="col-md-6">
                            <div class="bwp-image"> <a href="#"> <img
                                src="{{ asset('assets/frontend/img/Mask Group 2.png') }}"
                                        alt="" class="lazyloaded"
                                        data-ll-status="loaded"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bwp-image"> <a href="#"> <img
                                src="{{ asset('assets/frontend/img/Mask Group 2.png') }}"
                                        alt="" class="lazyloaded"
                                        data-ll-status="loaded"></a>
                            </div>
                        </div>
                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>
    <!-- ads -->
    {{-- <section class="ads-section">
        <div class="ads-container">
            <div class="ads-row">
                <div class="ads-column ads-col-50 ads-inner-column ">
                    <div class="ads-element-populated">
                        <div class="ads-widget-wrap">
                            <div class="ads-element ads-widget">
                                <div class="ads-widget-container">
                                    <div class="ads-widget-banner">
                                        <div class="bg-banner">
                                            <div class="ads-banner-wrapper ads-banners">
                                                <div class="bwp-image"> <a href="#"> <img
                                                    src="{{ asset('assets/frontend/img/Mask Group 2.png') }}"
                                                            alt="" class="lazyloaded"
                                                            data-ll-status="loaded"><noscript><img
                                                                src="../wp-content/uploads/2020/02/Banner-1.jpg"
                                                                alt=""></noscript></a></div>
                                                <div class="banner-wrapper-infor"> <a class="button" href="#"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads-column ads-col-50 ads-inner-column ">
                    <div class="ads-element-populated">
                        <div class="ads-widget-wrap">
                            <div class="ads-element ads-widget">
                                <div class="ads-widget-container">
                                    <div class="ads-widget-banner">
                                        <div class="bg-banner">
                                            <div class="ads-banner-wrapper ads-banners">
                                                <div class="bwp-image"> <a href="#"> <img
                                                            src="{{ asset('assets/frontend/img/Mask Group 2.png') }}"
                                                            alt="" class="lazyloaded"
                                                            data-ll-status="loaded"><noscript><img
                                                                src="../wp-content/uploads/2020/02/Banner-1.jpg"
                                                                alt=""></noscript></a></div>
                                                <div class="banner-wrapper-infor"> <a class="button" href="#"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- categories section 2-->
    <!-- heading -->
    <section class="categorie-section">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <div class="categorie-column categorie-col-100 categorie-inner-column">
                    <div class="categorie-column-wrap categorie-element-populated">
                        <div
                            class="categorie-element categorie-element-98344ab text-block-wapper-5 categorie-widget categorie-widget-heading">
                            <div class="categorie-widget-container">
                                <h2 class="categorie-heading-title">
                                    BEST SELLERS
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- slider -->
    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        @foreach ($latesProducts as $latesProduct)
                        <div class="swiper-slide" style="margin-right: 40px;">
                            <div class="slider-box">
                                @if($latesProduct->created_at > Carbon\Carbon::now()->startOfWeek())
                                <p class="time">New</p>
                                @endif
                               
                                <div class="img-box">
                                    <img src="{{ asset('website/productImages/') }}/product_{{ $latesProduct->id }}_1.jpg">
                                </div>

                                <p class="detail">{{ $latesProduct->name }}

                                    <a href="#" class="price">Rs.{{ number_format($latesProduct->sale_price,2) }}</a>
                                </p>
                                <div class="cart">
                                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-product_id="{{ $latesProduct->id }}">Add To Cart</a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>

    <!-- slider -->
    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        @foreach ($latesProducts as $latesProduct)
                        <div class="swiper-slide" style="margin-right: 40px;">
                            <div class="slider-box">
                                @if($latesProduct->created_at > Carbon\Carbon::now()->startOfWeek())
                                <p class="time">New</p>
                                @endif
                               
                                <div class="img-box">
                                    <img src="{{ asset('website/productImages/') }}/product_{{ $latesProduct->id }}_1.jpg">
                                </div>

                                <p class="detail">{{ $latesProduct->name }}

                                    <a href="#" class="price">Rs.{{ number_format($latesProduct->sale_price,2) }}</a>
                                </p>
                                <div class="cart">
                                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-product_id="{{ $latesProduct->id }}">Add To Cart</a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>

    <!-- ads -->
    
    {{-- <section class="ads-section">
        <div class="ads-container">
            
            <div class="ads-row">
                <div class="ads-column ads-col-50 ads-inner-column ">
                    <div class="ads-element-populated">
                        <div class="ads-widget-wrap">
                            <div class="ads-element ads-widget">
                                <div class="ads-widget-container">
                                    <div class="ads-widget-banner">
                                        <div class="bg-banner">
                                            <div class="ads-banner-wrapper ads-banners">
                                                <div class="bwp-image"> <a href="#"> <img
                                                            src="{{ asset('assets/frontend/img/Mask Group 1.png') }}"
                                                            alt="" class="lazyloaded"
                                                            data-ll-status="loaded"><noscript><img
                                                                src="../wp-content/uploads/2020/02/Banner-1.jpg"
                                                                alt=""></noscript></a>
                                                </div>
                                                <div class="banner-wrapper-infor"> <a class="button" href="#"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads-column ads-col-50 ads-inner-column ">
                    <div class="ads-element-populated">
                        <div class="ads-widget-wrap">
                            <div class="ads-element ads-widget">
                                <div class="ads-widget-container">
                                    <div class="ads-widget-banner">
                                        <div class="bg-banner">
                                            <div class="ads-banner-wrapper ads-banners">
                                                <div class="bwp-image"> <a href="#"> <img
                                                            src="{{ asset('assets/frontend/img/Mask Group 2.png') }}"
                                                            alt="" class="lazyloaded"
                                                            data-ll-status="loaded"><noscript><img
                                                                src="../wp-content/uploads/2020/02/Banner-1.jpg"
                                                                alt=""></noscript></a></div>
                                                <div class="banner-wrapper-infor"> <a class="button" href="#"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section> --}}

    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        <div class="col-md-6">
                            <div class="bwp-image"> <a href="#"> <img
                                src="{{ asset('assets/frontend/img/Mask Group 1.png') }}"
                                        alt="" class="lazyloaded"
                                        data-ll-status="loaded"></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bwp-image"> <a href="#"> <img
                                src="{{ asset('assets/frontend/img/Mask Group 1.png') }}"
                                        alt="" class="lazyloaded"
                                        data-ll-status="loaded"></a>
                            </div>
                        </div>
                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>

    <!-- categories section 2-->
    <!-- heading -->
    <section class="categorie-section">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <div class="categorie-column categorie-col-100 categorie-inner-column">
                    <div class="categorie-column-wrap categorie-element-populated">
                        <div
                            class="categorie-element categorie-element-98344ab text-block-wapper-5 categorie-widget categorie-widget-heading">
                            <div class="categorie-widget-container">
                                <h2 class="categorie-heading-title">
                                    FEATURE PRODUCTS
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- slider -->
    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        @foreach ($featureProducts as $featureProduct)
                        <div class="swiper-slide" style="margin-right: 40px;">
                            <div class="slider-box">
                                @if($featureProduct->created_at > Carbon\Carbon::now()->startOfWeek())
                                <p class="time">New</p>
                                @endif
                               
                                <div class="img-box">
                                    <img src="{{ asset('website/productImages/') }}/product_{{ $featureProduct->id }}_1.jpg">
                                </div>

                                <p class="detail">{{ $featureProduct->name }}

                                    <a href="#" class="price">Rs.{{ number_format($featureProduct->sale_price,2) }}</a>
                                </p>
                                <div class="cart">
                                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-product_id="{{ $featureProduct->id }}">Add To Cart</a>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>

    <!-- slider -->
    <section class="categorie-section" style="margin-bottom: 3px;">
        <div class="categorie-container categorie-column-gap-default">
            <div class="categorie-row">
                <!--swiper slider-->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!--slide 1-------------------------------------->
                        @foreach ($featureProducts as $featureProduct)
                        <div class="swiper-slide" style="margin-right: 40px;">
                            <div class="slider-box">
                                @if($featureProduct->created_at > Carbon\Carbon::now()->startOfWeek())
                                <p class="time">New</p>
                                @endif
                               
                                <div class="img-box">
                                    <img src="{{ asset('website/productImages/') }}/product_{{ $featureProduct->id }}_1.jpg">
                                </div>

                                <p class="detail">{{ $featureProduct->name }}

                                    <a href="#" class="price">Rs.{{ number_format($featureProduct->sale_price,2) }}</a>
                                </p>
                                <div class="cart">
                                    <a href="javascript:void(0)" class="add-to-cart" id="add-to-cart" data-product_id="{{ $featureProduct->id }}" >Add To Cart</a>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>

                <!--swiper  slider end-->
            </div>
        </div>
    </section>
    @endsection

    @section('pageCustomJS')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                _this =  $(this);
                var productId = _this.data('product_id');

                if(productId == null || productId == ''){
                    console.log('productId filed is empty');
                
                }else{
                    $.ajax({
                        type:"GET",
                        url: "{{url('product/product-add-to-cart')}}/" +productId??'',
                        cache: false,
                        beforeSend: function(){

                            _this.text('Adding...');
                        },
                        success: function(response){
                          console.log(response['message']);
                          _this.text('Added In Cart');
                          if(response['message']){
                            $('#refresh').load(document.URL + ' #refresh');
                            // $('html, body').animate({ scrollTop: 0 }, 'slow');
                                $.toast({
                                    heading: 'Success!',
                                    position: 'top-center',
                                    text: 'Product added to Cart',
                                    loaderBg: '#fff',
                                    icon: 'success',
                                    hideAfter: 2000,
                                    stack: 2
                                });
                            
                          }else{
                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            _this.text('Add To Cart');
                            $('#refresh').load(document.URL + ' #refresh');
                                $.toast({
                                    heading: 'error!',
                                    position: 'top-center',
                                    text: 'Product not added to Cart',
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 2000,
                                    stack: 2
                                });
                          }
                           
                        }
                    });
                }
            });
            $("#refresh").delegate(".cart_item_remove", "click", function(){
                _this =  $(this);
                var productId = _this.data('id');
                console.log(productId);
                if(productId == null || productId == ''){
                    console.log('productId filed is empty');
                
                }else{
                    $.ajax({
                        type:"GET",
                        url: "{{url('product/product-remove-from-cart')}}/" +productId??'',
                        cache: false,
                        beforeSend: function(){
                            _this.text('Removing...');
                        },
                        success: function(response){
                            
                          if(response == 1){
                            $('#refresh').load(document.URL + ' #refresh');
                            _this.text('Add To Cart');

                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                            $.toast({
                                    heading: 'Success!',
                                    position: 'top-center',
                                    text: 'Product remove from Cart',
                                    loaderBg: '#fff',
                                    icon: 'success',
                                    hideAfter: 2000,
                                    stack: 2
                                });
                            
                          }else{
                            $('#refresh').load(document.URL + ' #refresh');
                            _this.text('Add To Cart');

                            $('html, body').animate({ scrollTop: 0 }, 'slow');
                                $.toast({
                                    heading: 'error!',
                                    position: 'top-center',
                                    text: 'Product remove from Cart',
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 2000,
                                    stack: 2
                                });
                          }
                           
                        }
                    });
                }
            });
        });
    </script>
    @endsection