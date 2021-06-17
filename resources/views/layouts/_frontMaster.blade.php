<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop At Tip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- footer -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- footer -->


    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('customStyle')

</head>

<body>
    <header>
        <!-- navbar -->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Email : shopaatip@naufnetwork.com</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>SELLER CENTER</a></li>
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
                        <div class="wpbingoLogo" > <a href="#"> <img  src="{{ asset('assets/frontend/img/logo3.png') }}"
                                    alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 header-search-form hidden-sm hidden-xs">
                        <form role="search" method="get" class="search-from search">
                            @csrf
                            <div class="select_category pwb-dropdown dropdown"> <span
                                    class="pwb-dropdown-toggle dropdown-toggle" data-toggle="dropdown">All
                                    Category</span> <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                <ul class="pwb-dropdown-menu dropdown-menu category-search" id="expend" data-id="0">
                                    @if(sizeof($allcategories))
                                    <li data-value="" class="active">All Category</li>
                                        @foreach ($allcategories as $category)
                                            <li data-value="audio-{{ $category->name }}" class="category" id="category" data-id = "{{$category->id}}">{{ $category->name }}</li>
                                        @endforeach
                                    @else
                                    <li data-value="" class="active">No Categories</li>
                                    @endif
                                </ul> <input type="hidden" name="product_cat" class="product-cat" value="">
                            </div>
                            <div class="search-box"> <input type="text" class="input-search s"
                                    placeholder="I’m searching for...">
                                <ul class="result-search-products"></ul> <button id="searchsubmit2" class="btn"
                                    type="submit"> <span class="icon-search"> <i class="fa fa-search"></i></button>
                            </div> <input type="hidden" name="post_type" value="product">
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
                            <div class="col-md-4 hm-icon">
                                <a href="#"><img src="{{ asset('assets/frontend/img/shop.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="headimage">
                <img id="headimage" src="{{ asset('assets/frontend/img/headimage.jpg') }}" style="width: 100%;height:200px" alt=""
                    class="lazyloaded" data-ll-status="loaded">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="categories-vertical-menu hidden-sm hidden-xs show">
                            <h3 class="widget-title" style="background-color: red;"><i class="fa fa-list"></i>Browse
                                categories
                            </h3>
                            <div class="menu-container-hm">
                                <ul class="menu-hm">
                                
                                    @foreach ($allcategories as $category)
                                    <li class="ty-compact-list"><a href="{{ @$category->id }}">{{ @$category->name }}</a>
                                        @php
                                        $subcategories = App\SubCategory::with('category')->where('status',1)->where('deleted_at',null)->get();
                                        $childSubcategories = App\ChildSubCategory::with('subCategory')->where('status',1)->where('deleted_at',null)->get();
                                        @endphp
                                        <div class="megadrop">
                                            @foreach ($subcategories as $subcategory)
                                            @if(@$category->id == @$subcategory->category_id)
                                            <div class="col">
                                                <h3>{{  @$subcategory->name }}</h3>
                                                <ul>
                                                    @foreach ($childSubcategories as $childSubcategory)
                                                    @if(@$subcategory->id == @$childSubcategory->sub_category_id)
                                                    <li><a href="#">{{ @$childSubcategory->name }}</a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            @endforeach
                                            
    
                                        </div>
    
                                    </li>
                                    @endforeach
                                    @if(sizeof($allcategories))
                                    <li class="show-more" value="1"><i class="fa fa-plus" aria-hidden="true" style="margin-right: 14px;"></i>Other</a>
                                    </li>
                                    @endif
                                    <div class="bwp-image sale" style="margin-left: -3px;">
                                        <a href="#"> <img src="{{asset('website')}}/{{$allcategories[5]->banner}}">
                                  <img src="../wp-content/uploads/2020/02/banner6-8.jpg" alt="">
                                </a>
                                    </div>
    
    
                                    <div>
    
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
                    @yield('slider')

                </div>
            </div>
        </div>
    </header>
    <section>
        @yield('content')

        <!-- Footer -->

        <div class="mt-5 pt-5 pb-5 footer">
            <div class="container">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-4 col-xs-12 about-company" style="margin-right: 30px;">
                        <img class="img-footer" src="{{ asset('assets/frontend/img/logo3.png') }}" alt="">
                        <p class="pr-5 text-white-50">Shop At Tip is such a platform to build a border less marketplace
                            both for physical and digital goods.
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
                            <li><a href="#">Login</a></li>
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
                        <p class=""><small class="text-white-50">© Copyright 2021 Shopattip. All Rights
                                Reserved.</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <script>
        //this will execute on page load(to be more specific when document ready event occurs)
        if ($('.ty-compact-list').length > 8) {
            $('.ty-compact-list:gt(7)').hide();
            $('.show-more').show();
        }

        $('.show-more').on('click', function () {
                //toggle elements with class .ty-compact-list that their index is bigger than 2
                $('.ty-compact-list:gt(7)').toggle();
                if ($('.show-more').val() == 1) {
                    $(this).html('<i class="fa fa-minus" aria-hidden="true" style="margin-right: 14px;"></i>Close');
                    $('.show-more').val(0);
                } else {
                    $(this).html('<i class="fa fa-plus" aria-hidden="true" style="margin-right: 14px;"></i>Other');
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

                // $('.category').mouseenter(function(){
                //     var id = $(this).data('id');
                //     console.log(id);
                //     var urls = '{{ URL::asset('website/') }}'
                //     if(id == null || id == ''){
                //         console.log('id filed is empty');
                    
                //     }else{
                //         $.ajax({
                //             type:"GET",
                //             url: "{{url('category/category-banner')}}/" +id??'',
                //             data:{ 
                //                     _token:'{{ csrf_token() }}',
                                    
                //                 },
                //             cache: false,

                //             beforeSend: function(){

                //             },
                //             success: function(banner){
                //                 console.log(banner);
                //                 if(banner != '' && banner != null){
                //                     var image = '{{ asset("/website/") }}';
                //                 $("#headimage").attr('src',image+"/"+banner);
                //                 }
                               
                                
                //             }
                //         });
                //     }
                        
                // });
        });
    </script>

      @yield('externalJsLinks')
      @yield('pageCustomJS')
</body>

</html>