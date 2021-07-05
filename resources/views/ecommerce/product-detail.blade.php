@extends('layouts.master')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <h4 class="box-title">Product Details</h4>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box text-center">
                            <img src="{{asset('plugins/images/chair2.jpg')}}" id="product-image" class="img-responsive" />
                        </div>
                        <div class="pro-photos">
                            {{-- <div class="photos-item item-active">
                                <img data-color="black" src="{{asset('plugins/images/chair.jpg')}}">
                            </div> --}}
                            <div class="photos-item item-active" data-color="black">
                                <img data-color="black"  src="{{asset('plugins/images/chair2.jpg')}}">
                            </div>
                            <div class="photos-item" data-color="blue">
                                <img data-color="blue" src="{{asset('plugins/images/chair3.jpg')}}">
                            </div>
                            <div class="photos-item" data-color="brown">
                                <img data-color="brown" src="{{asset('plugins/images/chair4.jpg')}}">
                            </div>
                            {{-- <div class="photos-item">
                                <img src="{{asset('plugins/images/chair2.jpg')}}">
                            </div>
                            <div class="photos-item">
                                <img src="{{asset('plugins/images/chair3.jpg')}}">
                            </div> --}}
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <h4 class="box-title m-t-0">Rounded Chair</h4>
                        <h2 class="pro-price m-b-0 m-t-20" id="price" data-price="72">&#36;72
                            <span class="old-price">&#36;100</span>
                            <span class="text-danger">28% off</span>
                        </h2>
                        <hr>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. but the majority have suffered alteration in some form, by injected humour</p>
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Color</h6>
                                <div class="input-group">
                                    <ul class="icolors">
                                        <li data-color="black" value="black" class="black active"></li>
                                        <li data-color="blue" value="blue" class="blue"></li>
                                        <li data-color="brown" value="brown" class="" style="background: brown"></li>
                                    </ul>
                                </div>
                                <h6 class="m-t-20">Available Size</h6>
                                <p class="checkbox">
                                    <input type="radio" class="form-check-input" name="size" id="size" value="S"><span class="label label-rounded label-default text-dark">S</span>
                                    <input type="radio" class="form-check-input" name="size" id="size" value="M"><span class="label label-rounded label-default text-dark">M</span>
                                    <input type="radio" class="form-check-input" name="size" id="size" value="L"><span class="label label-rounded label-default text-dark">L</span>
                                   
                                </p>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-danger m-r-5"> Buy Now </button>
                        <button class="btn btn-primary m-r-5" data-toggle="modal"  data-target="#myModal" data-backdrop="static" data-keyboard="false" id="addToCart"><i class="ti-shopping-cart"></i> Add to Cart</button>
                        <button class="btn btn-info"><i class="ti-plus"></i> Add to Compare</button>
                        <h3 class="box-title m-t-40">Key Highlights</h3>
                        <ul class="list-icons">
                            <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
                            <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
                            <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li>
                        </ul>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Your Cart</h4>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label for="">Image</label><br>
                                        <img src="" alt="" id="p-image" width="50px" height="50px">
                                    </div>
                                    <div class="col-md-3" >
                                        <label for=""> color</label><br>
                                        <span id="p-color"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Size</label><br>
                                        <span id="p-size"></span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Price</label><br>
                                        <span id="p-price"></span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"  id="close">Close</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>
  







                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title m-t-40">General Info</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td width="390">Brand</td>
                                    <td> Stellar </td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td> Knock Down </td>
                                </tr>
                                <tr>
                                    <td>Seat Lock Included</td>
                                    <td> Yes </td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td> Office Chair </td>
                                </tr>
                                <tr>
                                    <td>Style</td>
                                    <td> Contemporary &amp; Modern </td>
                                </tr>
                                <tr>
                                    <td>Wheels Included</td>
                                    <td> Yes </td>
                                </tr>
                                <tr>
                                    <td>Upholstery Included</td>
                                    <td> Yes </td>
                                </tr>
                                <tr>
                                    <td>Upholstery Type</td>
                                    <td> Cushion </td>
                                </tr>
                                <tr>
                                    <td>Head Support</td>
                                    <td> No </td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td> Study &amp; Home Office </td>
                                </tr>
                                <tr>
                                    <td>Adjustable Height</td>
                                    <td> Yes </td>
                                </tr>
                                <tr>
                                    <td>Model Number</td>
                                    <td> F01020701-00HT744A06 </td>
                                </tr>
                                <tr>
                                    <td>Armrest Included</td>
                                    <td> Yes </td>
                                </tr>
                                <tr>
                                    <td>Care Instructions</td>
                                    <td> Handle With Care, Keep In Dry Place, Do Not Apply Any Chemical For Cleaning. </td>
                                </tr>
                                <tr>
                                    <td>Finish Type</td>
                                    <td> Matte </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="box-title">Related Products</h4>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <img src="{{asset('plugins/images/chair.jpg')}}" class="img-responsive" />
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Rounded Chair</h3>
                    <small class="text-muted db">globe type chair for rest</small>
                    <span class="pro-dis bg-danger">28% <br> off</span>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <img src="{{asset('plugins/images/chair2.jpg')}}" class="img-responsive" />
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Rounded Chair</h3>
                    <small class="text-muted db">globe type chair for rest</small>
                    <span class="pro-dis bg-success">28% <br> off</span>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <img src="{{asset('plugins/images/chair4.jpg')}}" class="img-responsive" />
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Rounded Chair</h3>
                    <small class="text-muted db">globe type chair for rest</small>
                    <span class="pro-dis bg-info">28% <br> off</span>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.right-sidebar')

</div>
@endsection


@push('js')
    <script type="text/javascript">
        $(function() {
            $('.icolors li').on("click", function() {
                var _this = $(this);
                var color = _this.data("color");
                // console.log(color);
                $('.icolors li').removeClass('active');
                _this.addClass('active');

                var listItems = $(".photos-item");
                listItems.each(function(idx, li) {
                    
                    var product = $(li);
                    // console.log(product[0]['attributes']);
                    // console.log(product['context']['dataset']['color']);
                    if(color == product['context']['dataset']['color']){
                        // $(li).attr('src', src);
                        $('.photos-item').removeClass('item-active');
                        $(li).addClass('item-active');
                        // console.log($(".item-active").children());
                        var img = $(".item-active").children();
                        console.log(img[0]['currentSrc']);
                        $('#product-image').attr('src',img[0]['currentSrc']);
                    }else{
                        console.log('no');
                    }
                });
            });

            $('.photos-item').on("click", function() {
                var _this = $(this);
                var src = _this.children().attr('src');
                $('#product-image').attr('src', src);
                $('.photos-item').removeClass('item-active');
                _this.addClass('item-active');
                var i = 0;
                var clr;
                var color = _this.data("color")
                console.log(color);
                var listItems = $(".icolors li");
                listItems.each(function(idx, li) {
                    
                    var product = $(li);
                    console.log('============>',product);
                    console.log(product['context']['dataset']['color']);
                    if(color == product['context']['dataset']['color']){
                        
                        $('.icolors li').removeClass('active');
                        $(li).addClass('active');
                    }
                });
               
                
            });
        });
        $(document).on('click','#addToCart', function(){
           var src      =   $('#product-image').attr('src');
           var color    =   $('.icolors li.active').data('color');
           var size     =   $(".checkbox input[name='size']:checked").val();
           var price    =   $("#price").data('price');
           if(src == ''){
               alert('select img');
               setTimeout(function() {$('#myModal').modal('hide');}, 0000);

               return false;
           }else if(color == undefined){

               alert('select color');
               setTimeout(function() {$('#myModal').modal('hide');}, 0000);
               return false;
           }else if(size == undefined){
               alert('select size');
               setTimeout(function() {$('#myModal').modal('hide');}, 0000);

               return false;
           }else if(price == ''){
               alert('select price');
               setTimeout(function() {$('#myModal').modal('hide');}, 0000);

               return false;
           }else{
                $('#p-image').attr('src',src);
                $('#p-color').append(color);
                $('#p-size').append(size);
                $('#p-price').append('$',price);

           }

           
           console.log(size);
        });

        $('#close').click(function(){
          
                $('#p-image').attr('src','');
                $('#p-color').text('');
                $('#p-size').text('');
                $('#p-price').text('');
        });

        
    </script>
@endpush