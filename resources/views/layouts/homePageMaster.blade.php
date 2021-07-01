<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHOPAATIP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- footer -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="fonts/icomoon/style.css"> --}}
    <!-- footer -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>

  
    {{-- <link rel="stylesheet" href="fonts/icomoon/style.css"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('customStyle')
<style>
    ul.dropdown-cart{
    min-width:250px;
    }
    ul.dropdown-cart li .item{
        display:block;
        padding:3px 10px;
        margin: 3px 0;
    }
    ul.dropdown-cart li .item:hover{
        background-color:#b8b3b3;
    }
    ul.dropdown-cart li .item:after{
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    ul.dropdown-cart li .item-left{
        float:left;
    }
    ul.dropdown-cart li .item-left img,
    ul.dropdown-cart li .item-left span.item-info{
        float:left;
    }
    ul.dropdown-cart li .item-left span.item-info{
        margin-left:10px;   
    }
    ul.dropdown-cart li .item-left span.item-info span{
        display:block;
    }
    ul.dropdown-cart li .item-right{
        float:right;
    }
    ul.dropdown-cart li .item-right button{
        margin-top:14px;
    }
    a.sub_cat{
        
    }
   
</style>

</head>

<body>
    <header>
        <!-- navbar -->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Email : support@domain.com</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li><a href="{{ url('/dashboard') }}"><span class="glyphicon glyphicon-user"></span>DASHBOARD</a></li>
                    @else
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span>SELLER CENTER</a></li>
                    @endif
                   
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>REGISTER</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>LOGIN</a></li>
                </ul>
            </div>
        </nav>
        <!-- navbar -->
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-logo">
                        <div class="wpbingoLogo"> <a href="#"> <img src="{{ asset('assets/frontend/img/logo3.png') }}"
                                    alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 header-search-form hidden-sm hidden-xs">
                        <form role="search" method="get" class="search-from search">
                            <div class="select_category pwb-dropdown dropdown"> <span
                                    class="pwb-dropdown-toggle dropdown-toggle" data-toggle="dropdown">All
                                    Category</span> <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                <ul class="pwb-dropdown-menu dropdown-menu category-search" id="expend" data-id="0">
                                    @if(sizeof($allcategories))
                                    <li data-value="" class="active">All Category</li>
                                    @foreach ($allcategories as $category)
                                    <li data-value="audio-{{ $category->name }}" class="category" id="category"
                                        data-id="{{$category->id}}">{{ $category->name }}</li>
                                    @endforeach
                                    @else
                                    <li data-value="" class="active">No Categories</li>
                                    @endif
                                </ul> <input type="hidden" name="product_cat" class="product-cat" value="">
                            </div>
                            <div class="search-box"> 
                                <input type="text" name="searching_item" id="searching_product" class="input-search s" placeholder="I’m searching for...">
                                <ul class="result-search-products"></ul> 
                                {{-- <input type="humber" name="employeeid" id="employeeid"> --}}
                                <button id="searchsubmit2" class="btn" type="submit"> <span class="icon-search"> <i class="fa fa-search"></i></button>
                            </div> 
                            <input type="hidden" name="post_type" value="product">
                        </form>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-page-link">
                        <div class="row">
                            <div class="col-md-4 hm-icon">
                                <a href="#"><img src="{{ asset('assets/frontend/img/user.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-4 hm-icon">
                                <a href="#"><img src="{{ asset('assets/frontend/img/heart.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-4 hm-icon" id="refresh">
                                @php 
                                $total = $total_qty = 0
                                @endphp
                                @foreach((array) session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                                <?php $total_qty ++ ?>
                              
                                @endforeach
                                {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="{{ asset('assets/frontend/img/shop.png') }}" alt=""></a><span class="badge">3</span> --}}
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown" style="margin-top: -32px; !important">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="badge">@if(session('cart')){{ $total_qty }}@else {{ 0 }} @endif</span><span class="caret"></span> <img src="{{ asset('assets/frontend/img/shop.png') }}" alt=""></a>
                                      <ul class="dropdown-menu dropdown-cart" role="menu" style="background:white">
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                          <li>
                                              <span class="item">
                                                <span class="item-left">
                                                    <img src="{{ asset('website/productImages/product_'.$details['id'].'_1.jpg') }}" style="width: 50px;height:50px;" alt="" />
                                                    <span class="item-info">
                                                        {{-- <span>ID:{{$details['id'] }}</span> --}}
                                                        <span style="color: black">{{ $details['name'] }}</span>
                                                        <span style="color: black">Rs.{{ $details['price'] }}</span>
                                                        <span style="color: black">Quantity:{{ $details['quantity'] }}</span>
                                                        <span style="color: black">Total:{{$details['quantity']* $details['price']}}</span>
                                                    </span>
                                                </span>
                                                <span class="item-right">
                                                    <button class="btn btn-xs btn-danger pull-right cart_item_remove" data-id={{ $details['id'] }}>x</button>
                                                </span>
                                            </span>
                                          </li>
                                        @endforeach
                                        @else
                                        <h5 style="text-align: center">Cart has no Item</h5>
                                        @endif
                                          <li class="divider"></li>
                                          <div class="col-md-6" style="font-weight: bold;">
                                            Subtotal:
                                          </div>
                                          <div class="col-md-6" style="text-align: right;font-weight: bold;">
                                            {{$total}}
                                          </div>
                                          {{-- <span class="text-center">Subtotal:{{$total}}</span> --}}
                                          <li><a class="text-center" href="">View Cart</a></li>
                                      </ul>
                                    </li>
                                  </ul> 
                            </div>
                           
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="headimage">
                <img src="{{ asset('assets/frontend/img/headimage.jpg') }}" style="width: 100%;" alt=""
                    class="lazyloaded" data-ll-status="loaded">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="categories-vertical-menu hidden-sm hidden-xs show">
                            <h3 class="widget-title" style="background-color: red;"><i class="fa fa-list"></i>Browse
                                categories
                            </h3>
                            @php
                            $subcategories =
                            App\SubCategory::with('category')->where('status',1)->where('deleted_at',null)->get();
                            $childSubcategories =
                            App\ChildSubCategory::with('subCategory')->where('status',1)->where('deleted_at',null)->get();
                            @endphp
                            <div class="menu-container-hm">
                              
                                <ul class="first">
                                @if(sizeof($allcategories))
                                @foreach ($allcategories as $key => $category)
                                    <li class="level-1">
                                        <a style="word-break: break-all; " href="">{{ $category->name }}</a>
                                        <ul class="second">
                                        @foreach ($category['subCategory'] as $key => $subcategory)
                                            <li ><a style="word-break: break-all !important;" href="" data-id="{{  @$subcategory->id }}" class="sub_cat" >{{  @$subcategory->name }}</a>
                                              <ul class="third">
                                                @foreach ($subcategory['childSubcategory'] as $key => $childSubcategory)
                                                <li><a style="word-break: break-all; " href="">{{ $childSubcategory->name }}</a></li>
                                                @endforeach
                                              </ul>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    @endif
                                    {{-- <li class="level-1"><a href="">men's fashion</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                    </li>

                                    <li class="level-1"><a href="">Health & Beauty</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                    </li>

                                    <li class="level-1"><a href="">kids collection</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                    </li>
    
                                    <li class="level-1"><a href="">kitchen appliances</a>
                                      <ul class="second">
                                          <li><a href="">submenu</a></li>
                                          <li><a href="">submenu</a></li>
                                          <li><a href="">submenu</a></li>
                                          <li><a href="">submenu</a>
                                          </li>
                                          <li><a href="">Submenu</a>
                                            <ul class="third">
                                              <li><a href="">child-menu</a></li>
                                              <li><a href="">child-menu</a></li>
                                              <li><a href="">child-menu</a></li>
                                              <li><a href="">child-menu</a></li>
                                              <li><a href="">child-menu</a>
                                                
                                              </li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>

                                    <li class="level-1"><a href="">mobile accessories</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                    </li>

                                    <li class="level-1"><a href="">sexual wellness</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                      </li>
                                      <li class="level-1"><a href="">women6</a>
                                        <ul class="second">
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a></li>
                                            <li><a href="">submenu</a>
                                            </li>
                                            <li><a href="">Submenu</a>
                                              <ul class="third">
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a></li>
                                                <li><a href="">child-menu</a>
                                                  
                                                </li>
                                              </ul>
                                            </li>
                                          </ul>
                                    </li>

                                    <li class="level-1"><a href="">women6</a>
                                        <ul class="second">
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a>
                                          </li>
                                          <li><a href="">items</a>
                                            <ul class="third">
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a>
                                                
                                              </li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>

                                    <li class="level-1"><a href="">women6</a>
                                        <ul class="second">
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a></li>
                                          <li><a href="">items</a>
                                          </li>
                                          <li><a href="">items</a>
                                            <ul class="third">
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a></li>
                                              <li><a href="">items2</a>
                                                
                                              </li>
                                            </ul>
                                          </li>
                                        </ul>
                                    </li>  --}}
                                    <li class="show-more" value="1"><a href=javascript:void(0)><i class="fa fa-plus" aria-hidden="true"> </i>   Other</a>
                                    </li>
                                    {{-- <li class="level-1 show-more" value="1"><a href=javascript:void(0)><i id="plus_minus" class="fa fa-plus" aria-hidden="true" ></i>  Other</a></li> --}}
                                      {{-- <li class="level-1 show-more" value="1"><i class="fa fa-plus" aria-hidden="true" ></i>Other</a>
                                      </li> --}}
                                      <div class="bwp-image sale" style="margin-left: 2px;margin-top: 8px;margin-bottom: -9px;" >
                                        <a href="#"> <img src="{{ asset('assets/frontend/img/Mask Group 6.png') }}">
                                           
                                        </a>
                                    </div>
                                  </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-10 col-lg-9 col-md-12 col-sm-12 col-xs-12 header-main">
                        <div class="content-header">
                            <div class="header-menu-bg">
                                <div class="menu-wrapper">
                                    <div class="megamenu">
                                        <nav class="navbar-default">
                                            <div class="navbar-header"> <button type="button" id="show-megamenu"
                                                    class="navbar-toggle">
                                                    <span>Menu</span> </button></div>
                                            <div class="bwp-navigation primary-navigation navbar-mega"
                                                data-text_close="Close">
                                                <div class="float-menu">
                                                    <nav id="main-navigation" class="std-menu clearfix">
                                                        <div class="menu-main-menu-container">
                                                            <ul id="menu-main-menu" class="menu">
                                                                <li class="level-0">
                                                                    <a href="#"><span
                                                                            class="menu-item-text">Home</span></a>
                                                                </li>
                                                                <li class="level-0">
                                                                    <a href="#"><span
                                                                            class="menu-item-text">Shop</span></a>
                                                                </li>
                                                                <li class="level-0">
                                                                    <a href="#"><span
                                                                            class="menu-item-text">Blog</span></a>
                                                                </li>
                                                                <li class="level-0">
                                                                    <a href="#"><span
                                                                            class="menu-item-text">PORTFOLIO</span></a>
                                                                </li>
                                                                <li class="level-0">
                                                                    <a href="#"><span
                                                                            class="menu-item-text">CONTACT</span></a>
                                                                </li>
                                                        </div>
                                                </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="shipping hidden-md hidden-sm hidden-xs">
                                <div class="hktext"><span>Free Shipping</span></div>
                            </div>
                        </div>
                    </div>
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
                                                                <div class="bwp-image"> <a href="#"> <img
                                                                            src="https://wpbingosite.com/wordpress/dimita/wp-content/uploads/2020/02/Banner-3.jpg"
                                                                            alt="" class="lazyloaded"
                                                                            data-ll-status="loaded"><noscript><img
                                                                                src="../wp-content/uploads/2020/02/Banner-3.jpg"
                                                                                alt=""></noscript></a>
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
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path1.png') }}"
                                                alt="">
                                            <!-- <i class="fa fa-headphones jiggle" aria-hidden="true"></i> -->
                                        </div>
                                        <div class="item-title">
                                            <a href="#">Audio & home</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item-product-cat-content">
                                        <div class="item-icon">
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path2.png') }}"
                                                alt="">
                                        </div>
                                        <div class="item-title">
                                            <a href="#">Camera</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item-product-cat-content">
                                        <div class="item-icon">
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path3.png') }}"
                                                alt="">
                                        </div>
                                        <div class="item-title">
                                            <a href="#">accessories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item-product-cat-content">
                                        <div class="item-icon">
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path4.png') }}"
                                                alt="">
                                        </div>
                                        <div class="item-title">
                                            <a href="#">home & garden</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item-product-cat-content">
                                        <div class="item-icon">
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path5.png') }}"
                                                alt="">
                                        </div>
                                        <div class="item-title">
                                            <a href="#">smart phone</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item-product-cat-content">
                                        <div class="item-icon">
                                            <img class="jiggle" src="{{ asset('assets/frontend/img/Path6.png') }}"
                                                alt="">
                                        </div>
                                        <div class="item-title">
                                            <a href="#">Technologies</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <!-- Footer -->

    <div class="mt-5 pt-5 pb-5 footer">
        <div class="container">
            <div class="row" style="margin-top: 50px;">
                <div class="col-lg-4 col-xs-12 about-company" style="margin-right: 30px;">
                    <img class="img-footer" src="{{ asset('assets/frontend/img/logo3.png') }}" alt="">
                    <p class="pr-5 text-white-50">Shop At Tip is such a platform to build a border less marketplace both
                        for physical and digital goods.
                    </p>
                    <p>Follow us on :
                        <a class=" footer-icon" href="#"><i class="fa fa-facebook-square"></i></a>
                        <a class=" footer-icon" href="#"><i class="fa fa-linkedin"></i></a>
                        <a class=" footer-icon" href="#"><i class="fa fa-twitter"></i></a>
                        <a class=" footer-icon" href="#"><i class="fa fa-instagram"></i></a>
                    </p>
                </div>
                <div class="col-lg-2 col-xs-12 links" style="margin-right: 30px;">
                    <h4 class="mt-lg-0 mt-sm-3">QUICK LINKS</h4>
                    <ul class="m-0 p-0">
                        <li><a href="{{ url('login') }}">Login</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-xs-12 links" style="margin-right: 30px;">
                    <h4 class="mt-lg-0 mt-sm-4">INFORMMATION</h4>
                    <ul class="m-0 p-0">
                        <li><a href="#">Terms Of Service</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Your Account</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-xs-12 links" style="margin-right: 30px;">
                    <h4 class="mt-lg-0 mt-sm-4">SHOPPING GUIDE</h4>
                    <ul class="m-0 p-0">
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Where is my Order?</a></li>
                        <li><a href="#">Our Story</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© Copyright 2021 Shopattip. All Rights Reserved.</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    </section>
    <script type="text/javascript" src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



    <script>
        if ($('.level-1').length > 8) {
            $('.show-more').show();

        }else{
            $('.show-more').hide();

        }
        //this will execute on page load(to be more specific when document ready event occurs)
        if ($('.level-1').length > 8) {
            $('.level-1:gt(8)').hide();
            $('.show-more').show();
        }
        
        $('.show-more').on('click', function() {
            //toggle elements with class .ty-compact-list that their index is bigger than 2
            $('.level-1:gt(8)').toggle();
            if($('.show-more').val()==1) {
                $(this).html('<a href=javascript:void(0)><i class="fa fa-minus" aria-hidden="true"> </i>   Close</a>');
                $('.show-more').val(0);
            }
            else {
                $(this).html('<a href=javascript:void(0)><i class="fa fa-plus" aria-hidden="true"> </i>   Other</a>');
                $('.show-more').val(1);
            }
        }
        
        );
        $(document).ready(function () {
                var val = $('#expend').data('id');
                if ($('.bbb_viewed_slider').length) {
                    var viewedSlider = $('.bbb_viewed_slider');
                    viewedSlider.owlCarousel({
                        loop: true,
                        margin: 30,
                        autoplay: true,
                        autoplayTimeout: 6000,
                        nav: false,
                        dots: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            575: {
                                items: 2
                            },
                            768: {
                                items: 3
                            },
                            991: {
                                items: 4
                            },
                            1199: {
                                items: 6
                            }
                        }
                    });
                    if ($('.bbb_viewed_prev').length) {
                        var prev = $('.bbb_viewed_prev');
                        prev.on('click', function () {
                            viewedSlider.trigger('prev.owl.carousel');
                        });
                    }
                    if ($('.bbb_viewed_next').length) {
                        var next = $('.bbb_viewed_next');
                        next.on('click', function () {
                            viewedSlider.trigger('next.owl.carousel');
                        });
                    }
                }

                
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $( "#searching_product" ).autocomplete({
                    source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('product.getProduct')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                        },
                        success: function( data ) {
                        response( data );
                        }
                    });
                    },
                    select: function (event, ui) {
                    // Set selection
                    $('#searching_product').val(ui.item.label); // display the selected text
                    $('#employeeid').val(ui.item.value); // save selected id to input
                    return false;
                    }
                });

                $('#searchsubmit2').click(function(e){
                    e.preventDefault();
                    var value = $( "#searching_product" ).val();
                    console.log(value);
                    
                })

            //     $('.sub_cat').hover(function() {
            //     _this = $(this);
            //     var li = '';
            //     var subcategory_id = _this.data('id'); 
            //     console.log(subcategory_id);
            //     $.ajax({
            //         type: "GET",
            //         dataType: "json",
            //         url: "{{url('home/get-child-category')}}/"+subcategory_id,
            //         success: function(data){
            //         console.log(data);
            //             $.each(data,function(index,row){
            //                 li +=`<li><a href="">`+row.name+`</a></li>`; 
            //             });
            //             $(".third").empty();
            //             $(".third").append(li);
            //         }
            //     });
            // });
            
            // $('.sub_cate').mouseout(function(){
            //     $(".third").empty();
            // });
        });
    </script>

    @yield('externalJsLinks')
    @yield('pageCustomJS')
</body>

</html>