@extends('layouts.frontMaster')
@section('customStyle')
<style></style>
@endsection

@section('content')

        @section('slider')
           <!-- slider -->
        <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12 slider">
            <div class="content-slider-header">
                <div class="slider-section">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @if(sizeof($sliders))
                            @foreach($sliders as $key => $slider)
                                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                            @endif
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @if(sizeof($sliders))
                            @foreach($sliders as $key => $slider)
                            <div class="item {{$key == 0 ? 'active' : '' }}">
                                <img src="{{asset('website')}}/{{$slider->slider_image}}" alt="Los Angeles"
                                    style="width: 727px;height: 410px;">
                            </div>
                            @endforeach
                            @endif
                            {{-- <div class="item active">
                                <img src="{{ asset('assets/frontend/img/slider1.jpg') }}" alt="Los Angeles"
                                    style="width: 727px;height: 410px;">
                            </div>

                            <div class="item">
                                <img src="{{ asset('assets/frontend/img/slider2.jpg') }}" alt="Chicago"
                                    style="width: 727px;height: 410px;">
                            </div>

                            <div class="item">
                                <img src="{{ asset('assets/frontend/img/slider3.jpg') }}" alt="New york"
                                    style="width: 727px;height: 410px;">
                            </div> --}}
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="brand-section">
                    <div class="ads-column ads-col-25 ads-top-column ads-element ads-element-fb2acbc ads-hidden-tablet ads-hidden-phone"
                        style="width: 166px;    margin-left: 34px;">
                        <div class="ads-column-wrap ads-element-populated">
                            <div class="ads-widget-wrap">
                                <div class="elementor-element elementor-element-bf22dbc elementor-widget elementor-widget-bwp_image"
                                    style="margin-bottom: 24px;" data-id="bf22dbc"
                                    data-element_type="widget" data-widget_type="bwp_image.default">
                                    <div class="elementor-widget-container">
                                        <div class="bwp-widget-banner default3">
                                            <div class="bg-banner">
                                                <div class="banner-wrapper banners">
                                                    <div class="bwp-image"> <a href="#"> 
                                                        <img src="https://wpbingosite.com/wordpress/dimita/wp-content/uploads/2020/02/Banner-3.jpg" alt="" class="lazyloaded" data-ll-status="loaded">
                                                                
                                                    </div>
                                                    <div class="banner-wrapper-infor">
                                                        <a class="button" href="#">
                                                        </a></div>
                                                </div>
                                            </div>
                                            <div class="ads-btn"><a href="#">TIPMART</a></div>
                                        </div>
                                    </div>
                                </div>



                                <div>

                                </div>
                                <div class="elementor-element elementor-element-f6c08c9 elementor-widget elementor-widget-bwp_image"
                                    data-id="f6c08c9" data-element_type="widget"
                                    data-widget_type="bwp_image.default">
                                    <div class="elementor-widget-container">
                                        <div class="bwp-widget-banner default3">
                                            <div class="bg-banner">
                                                <div class="banner-wrapper banners">
                                                    <div class="bwp-image"> <a href="#"> <img
                                                                src="https://wpbingosite.com/wordpress/dimita/wp-content/uploads/2020/02/Banner-4.jpg"
                                                                alt="" class="lazyloaded"
                                                                data-ll-status="loaded"><noscript><img
                                                                    src="../wp-content/uploads/2020/02/Banner-4.jpg"
                                                                    alt=""></noscript></a>
                                                    </div>
                                                    <div class="banner-wrapper-infor">
                                                        <a class="button" href="#">
                                                        </a></div>
                                                </div>
                                            </div>
                                            <div class="ads-btn"><a href="#">SHOPMALL</a></div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="row">
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-headphones jiggle" aria-hidden="true"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">Audio & home</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-camera jiggle" aria-hidden="true"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">Camera</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-battery-quarter jiggle" aria-hidden="true"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">accessories</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-phone jiggle" aria-hidden="true"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">home & garden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-desktop jiggle"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">smart phone</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="item-product-cat-content">
                            <div class="item-icon">
                                <i class="fa fa-desktop jiggle"></i>
                            </div>
                            <div class="item-title">
                                <a href="#">Technologies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endsection
        <!-- categories section 1-->
        <br>

        <!-- heading -->
        <section class="categorie-section" style="margin-top: 130px;">
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
                    <div class="categorie-column categorie-col-100 categorie-inner-column">
                        <div class="categorie-column-wrap categorie-element-populated">


                            <div class="bbb_viewed">
                                <div class="container hm">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bbb_main_container">
                                                <div class="bbb_viewed_title_container">
                                                    <div class="bbb_viewed_nav_container">
                                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                                class="fas fa-chevron-left"></i></div>
                                                        <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                                class="fas fa-chevron-right"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bbb_viewed_slider_container">
                                                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                                                        @foreach ($newArrivals as $newArrival)
                                                        <div class="owl-item">
                                                          
                                                            <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                              
                                                                    <div class="bbb_viewed_image">
                                                                        <img  src="{{ asset('website/productImages/') }}/product_{{ $newArrival->id }}_1.jpg" alt="" style="width: 100%; height:100%">
                                                                    </div>
                                                                    <div class="bbb_viewed_content text-center">
                                                                        <div class="bbb_viewed_price"> Rs.{{ number_format($newArrival->sale_price,2) }}</div>
                                                                        <div class="bbb_viewed_name"><a href="#">{{ $newArrival->name }}
                                                                                </a>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="item_marks">
                                                                        <li class="item_mark item_discount">-25%</li>
                                                                        <li class="item_mark item_new">new</li>
                                                                    </ul>
                                                            </div>
                                                          
                                                        </div>
                                                        @endforeach
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
        </section>

        <!-- ads -->
        <section class="ads-section">
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
                    <div class="categorie-column categorie-col-100 categorie-inner-column">
                        <div class="categorie-column-wrap categorie-element-populated">


                            <div class="bbb_viewed">
                                <div class="container hm">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bbb_main_container">
                                                <div class="bbb_viewed_title_container">
                                                    <div class="bbb_viewed_nav_container">
                                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                                class="fas fa-chevron-left"></i></div>
                                                        <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                                class="fas fa-chevron-right"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bbb_viewed_slider_container">
                                                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                                                        @foreach ($latesProducts as $latesProduct)
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image">
                                                                    <img  src="{{ asset('website/productImages/') }}/product_{{ $latesProduct->id }}_1.jpg" alt="" style="width: 100%; height:100%">

                                                                    </div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">Rs.{{ number_format($latesProduct->sale_price,2) }}</div>
                                                                    <div class="bbb_viewed_name"><a href="#">{{ $latesProduct->name }}</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endforeach
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
        </section>

        {{-- <!-- slider -->
        <section class="categorie-section" style="margin-bottom: 3px;">
            <div class="categorie-container categorie-column-gap-default">
                <div class="categorie-row">
                    <div class="categorie-column categorie-col-100 categorie-inner-column">
                        <div class="categorie-column-wrap categorie-element-populated">


                            <div class="bbb_viewed">
                                <div class="container hm">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bbb_main_container">
                                                <div class="bbb_viewed_title_container">
                                                    <div class="bbb_viewed_nav_container">
                                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                                class="fas fa-chevron-left"></i></div>
                                                        <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                                class="fas fa-chevron-right"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bbb_viewed_slider_container">
                                                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹30079</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            LED</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹30079</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            LED</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹22250</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            Mobile</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924275/images.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹1379</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Huawei
                                                                            Power</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924361/21HmjI5eVcL.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹225<span>₹300</span>
                                                                    </div>
                                                                    <div class="bbb_viewed_name"><a href="#">Sony
                                                                            Power</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹13275</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Speedlink
                                                                            Mobile</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
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
                </div>
            </div>
        </section> --}}

        <!-- ads -->
        <section class="ads-section">
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
                                                    <h1>hello</h1>
                                                    <div class="bwp-image"> <a href="#"> <img
                                                                src="{{ asset('assets/frontend/img/Mask Group 1.png') }}"
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
                    <div class="categorie-column categorie-col-100 categorie-inner-column">
                        <div class="categorie-column-wrap categorie-element-populated">


                            <div class="bbb_viewed">
                                <div class="container hm">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bbb_main_container">
                                                <div class="bbb_viewed_title_container">
                                                    <div class="bbb_viewed_nav_container">
                                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                                class="fas fa-chevron-left"></i></div>
                                                        <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                                class="fas fa-chevron-right"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bbb_viewed_slider_container">
                                                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                                                        @foreach ($featureProducts as $featureProduct)
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"> <img  src="{{ asset('website/productImages/') }}/product_{{ $featureProduct->id }}_1.jpg" alt="" style="width: 100%; height:100%">
                                                                </div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">Rs.{{ number_format($featureProduct->sale_price,2) }}</div>
                                                                    <div class="bbb_viewed_name"><a href="#">{{ $featureProduct->name }}</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                       
                                                        </div>
                                                        @endforeach
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
        </section>

        <!-- slider -->
        {{-- <section class="categorie-section" style="margin-bottom: 3px;">
            <div class="categorie-container categorie-column-gap-default">
                <div class="categorie-row">
                    <div class="categorie-column categorie-col-100 categorie-inner-column">
                        <div class="categorie-column-wrap categorie-element-populated">


                            <div class="bbb_viewed">
                                <div class="container hm">
                                    <div class="row">
                                        <div class="col">
                                            <div class="bbb_main_container">
                                                <div class="bbb_viewed_title_container">
                                                    <div class="bbb_viewed_nav_container">
                                                        <div class="bbb_viewed_nav bbb_viewed_prev"><i
                                                                class="fas fa-chevron-left"></i></div>
                                                        <div class="bbb_viewed_nav bbb_viewed_next"><i
                                                                class="fas fa-chevron-right"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bbb_viewed_slider_container">
                                                    <div class="owl-carousel owl-theme bbb_viewed_slider">
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹30079</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            LED</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹30079</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            LED</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹22250</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Samsung
                                                                            Mobile</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924275/images.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹1379</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Huawei
                                                                            Power</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924361/21HmjI5eVcL.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹225<span>₹300</span>
                                                                    </div>
                                                                    <div class="bbb_viewed_name"><a href="#">Sony
                                                                            Power</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="owl-item">
                                                            <div
                                                                class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                                <div class="bbb_viewed_image"><img
                                                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg"
                                                                        alt=""></div>
                                                                <div class="bbb_viewed_content text-center">
                                                                    <div class="bbb_viewed_price">₹13275</div>
                                                                    <div class="bbb_viewed_name"><a href="#">Speedlink
                                                                            Mobile</a></div>
                                                                </div>
                                                                <ul class="item_marks">
                                                                    <li class="item_mark item_discount">-25%</li>
                                                                    <li class="item_mark item_new">new</li>
                                                                </ul>
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
                </div>
            </div>
        </section> --}}
@endsection

@section('pageCustomJS')
<script></script>
@endsection