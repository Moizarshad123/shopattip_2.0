@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> --}}
    <link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <style>
        .wrap{
            word-break: break-all; 
        }
        #myTable_filter input{
            border-color: #6f6f6f !important;
        }
    </style>

@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
      
        <div class="row">
            <div class="col-sm-12">
                <?php
                $uri            = Request::path();
                $ruta_explode   = explode('/',$uri);
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
                            <a href="{{ asset('admin/vendors') }}">
                                {{ ucfirst('Vendors') }}
                            </a>
                            @else
                                {{ ucfirst('List') }}
                            @endif
                        </li>
                        <?php $val_url .= '/'?>
                        @endforeach
                    @endif
                </ol>
                <div class="white-box">
                    <h3 class="box-title pull-left">Vendors</h3>
                    {{-- @can('add-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product/create') }}"><i
                                    class="icon-plus"></i> Add Product</a>
                    @endcan --}}
                    <div class="clearfix"></div>
                <span id="msg"></span>

                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Vendor Type</th>
                                <th>Status</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                               
                            @foreach($vendors as $vendor)

                          
                            <tr>
                                <td>{{ $loop->iteration?? $vendor->id }}</td>
                                <td class="wrap">{{$vendor->name??''}}</td>
                                <td class="wrap">{{ $vendor->email??'' }}</td>
                                <td class="wrap">{{ $vendor->phone??'' }}</td>
                                <td class="wrap">{{$vendor->vendor_type??''}}</td>
                                <td>
                                    <input data-id="{{$vendor->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="approved" data-off="un-approved" {{ $vendor->status ? 'checked' : '' }}>
                                </td>

                                    {{-- <td>
                                        @can('view-'.str_slug('Product'))
                                            <a href="{{ url('/product/product/' . $vendor->id) }}"
                                               title="View Product">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Product'))
                                            <a href="{{ url('/product/product/' . $vendor->id . '/edit') }}"
                                               title="Edit Product">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Product'))
                                            <form method="POST"
                                                  action="{{ url('/product/product' . '/' . $vendor->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Product"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td> --}}
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
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
          

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 1000,
                stack: 6
            });
            @endif
        });

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });


        
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var user_id = $(this).data('id'); 
              
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{url('admin/vendor-status-change')}}",
                    data: {'status': status, 'user_id': user_id ,  _token:'{{ csrf_token() }}'},
                    success: function(data){
                    console.log(data.success);
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
                });
            });
       
    </script>

@endpush
