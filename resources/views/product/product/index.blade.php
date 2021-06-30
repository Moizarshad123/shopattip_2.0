@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>

          <meta name="csrf-token" content="{{ csrf_token() }}">
          <style>
            .wrap{
                word-break: break-all; 
            }
            #myTable_filter input{
            border-color: #6f6f6f !important;
            }
            .stock_stats_hover {
                    /* position: relative;
                    display: inline-block; */
                    cursor: pointer;
            }

            .stock_stats_hover .tooltiptext {
                visibility: hidden;
                width: 120px;
                background-color: black;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;

                /* Position the tooltip */
                position: absolute;
                z-index: 1;
            }

            .stock_stats_hover:hover .tooltiptext {
            
                visibility: visible;
            }
            /* .toggle.btn.btn-success{
                width: 94px !important;
            }
            .toggle.btn.btn-danger.off{
                width: 110px !important;
            } */
            .zoom {
                transition: transform 1s;
            }

            .add{
                filter: blur(4px);
            }

            .zoom:hover {
                transform: scale(1.5);
                /* filter: blur(4px); */
                z-index: 999;
                width: 200px;
                height: 200px;
                margin: 0 auto;
            }
        </style>
@endpush

@section('content')
    <div class="container-fluid" id="body">
        <!-- .row -->
        @if ($message = Session::get('flash_message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <?php
                $uri            = Route::currentRouteName();
                $ruta_explode   = explode('.',$uri);
                $last_array     = $ruta_explode[0];
            ?>
    
                <ol class="breadcrumb" style="background-color: #fffefe;">
                    <?php $val_url = ''?>
                    <li><a href="{{asset('/dashboard')}}"><i class="entypo-folder"></i> DASHBOARD</a></li>
                    @if(isset($ruta_explode) && count($ruta_explode)>0)
                        @foreach ($ruta_explode as $val)
                        <?php $val_url .= $val ?>
                        <li>
                            @if($last_array == $val_url)
                            <a href="{{ asset('product/'.$val_url) }}">
                                {{ ucfirst($val) }}
                            </a>
                            @else
                                {{ ucfirst($val) }}
                            @endif
                        </li>
                        <?php $val_url .= '/'?>
                        @endforeach
                    @endif
                </ol>
                <div class="white-box">
                    <h3 class="box-title pull-left">Products</h3>
                    @can('add-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product/create') }}"><i
                                    class="icon-plus"></i> Add Product</a>
                    @endcan
                    <div class="clearfix">
                    <button style="margin-bottom: 10px;margin-right:10px;" class="btn btn-primary pull-right delete_all"  id="delete_all" data-url="{{ url('deleteAllProducts') }}">Delete All Selected</button>

                    </div>
                    <hr>
                 
                    <div class="table-responsive">
                        <table class="table table-borderless data-checkbox" id="myTable">
                            <thead>
                            <tr>
                                <th class="bs-checkbox " style="width: 36px;"  data-field="0"><div class="th-inner "><label><input id="master" type="checkbox"><span></span></label></div></th>
                                <th>#</th>
                                <th>Product Type</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($product as $item)

                                <tr class="optionOnes">
                                    <td class="bs-checkbox optionOne" style="width: 36px; "><label>
                                        <input style="margin-left: 5px;" data-index="0" class="sub_chk" data-id="{{$item->id}}" type="checkbox">
                                        <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $loop->iteration?? $item->id }}</td>
                                    @if($item->product_type_id == 1)
                                    <td>General</td>
                                    @elseif($item->product_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                       
                                    <td class="wrap">{{$item->category[0]->name??''}}</td>
                                    <td class="wrap">{{ $item->subCategory[0]->name??'' }}</td>
                                    <td ><span class="zoom"><img  class="zoom" id="img_url" src="{{ asset('website/productImages/product_'.$item->id.'_1.jpg') }}" alt="your image" style="width: 80px;height:80px;" /></span> </td>
                                    {{-- <td class="wrap">{{ $item->subChildCategory[0]->name??'' }}</td> --}}
                                    {{-- <td  class="stock_stats_hover" data-id={{ $item->id }}>{!! $item->stock_status == 'outofstock' ? "<span class='badge badge-danger'>outofstock</span>" : ($item->stock_status=='instock' ? "<span class='badge badge-success'>Instock</span>": "")  !!}   <span  class="tooltiptext">Double Click To Change Status</span></td> --}}
                                    <td ><input  data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="INSTOCK" data-off="OUTOFSTOCK" {{ $item->stock_status == 'instock' ? 'checked' : '' }}></td>
                                    <td>
                                        @can('view-'.str_slug('Product'))
                                            <a href="{{ url('/product/product/' . $item->id) }}"
                                               title="View Product">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <br>
                                        @endcan

                                        @can('edit-'.str_slug('Product'))
                                            <a href="{{ url('/product/product/' . $item->id . '/edit') }}"
                                               title="Edit Product">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Product'))
                                            <form method="POST"
                                                  action="{{ url('/product/product' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Product"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>

    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            // $('.zoom').hover(function(){
            //     $('#body').addClass('add');
            // });
            $('.toggle-class').change(function(){
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var product_id = $(this).data('id'); 
                console.log(status);
                console.log(product_id);

                $.ajax({
                type:"POST",
                url:"{{ url('admin/product-stock-status') }}",
                data: {'status': status, 'product_id': product_id ,  _token:'{{ csrf_token() }}'},
                beforeSend: function(){

                },
                success: function(data){
                    console.log(data['message']);
                    if(data['message'] == 'error'){
                        swal({
                            title: "Something Went Wrong!",
                            text: "",
                            type: "error",
                            showCancelButton: false,
                            dangerMode: false,
                            // cancelButtonClass: '#DD6B55',
                            // confirmButtonColor: '#dc3545',
                            confirmButtonText: 'Reload Page!',
                        });

                    }else if(data['message'] == '0'){
                        swal({
                            title: "Something Went Wrong!",
                            text: "",
                            type: "error",
                            showCancelButton: false,
                            dangerMode: false,
                            // cancelButtonClass: '#DD6B55',
                            // confirmButtonColor: '#dc3545',
                            confirmButtonText: 'Reload Page!',
                        });

                    }else{
                        swal({
                            title: "Status Change Successfuly!",
                            text: "",
                            type: "success",
                            showCancelButton: false,
                            dangerMode: false,
                        // cancelButtonClass: '#DD6B55',
                        // confirmButtonColor: '#dc3545',
                        // confirmButtonText: 'Status Change Successfuly!',
                
                        });
                  
                    }
              
                }
                });
            });
           

            $('#delete_all').hide();

            $('#master').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $('#delete_all').show();
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                    $('#delete_all').hide();

                }
            });

            $('.sub_chk').on('click', function(e) {
                // get all checked items
                var checked = $('.optionOne').find(':checked');
                console.log('length',checked.length);
                if(checked.length < 1){
                    $('#delete_all').hide();
                }
                $.each(checked, function() {
                    if(checked.length > 0){
                        $('#delete_all').show();
                        console.log('yes')
                    }else if(checked.length < 1){
                        $('#delete_all').hide();
                    }
                
                });
                // $(".sub_chk:checked").each(function() {
                //     if($('.sub_chk').is(':checked',true))
                //     {
                //         console.log('yes');
                //         $('#delete_all').show();
                //     } else  if($('.sub_chk').is(':checked',false)) {
                //         console.log('no');

                //         $('#delete_all').hide();

                //     }
                // });
            });


            $('.delete_all').on('click', function(e) {


            var allVals = [];
            console.log(allVals);
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
                $('#delete_all').show();

            });


            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {


                var check = confirm("Are you sure you want to delete this row?");
                if(check == true){


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
                }
            }
            });


            $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
            });


            $(document).on('confirm', function (e) {
            var ele = e.target;
            alert(ele);
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
            });

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
