@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
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
                            <a href="{{ asset('admin/reviews') }}">
                                {{ ucfirst('reviews') }}
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
                    <h3 class="box-title pull-left">Reviews</h3>
                    {{-- @can('add-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product/create') }}"><i
                                    class="icon-plus"></i> Add Product</a>
                    @endcan --}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                            {{-- @foreach($product as $item)

                          
                                <tr>
                                    <td>{{ $loop->iteration?? $item->id }}</td>
                                    @if($item->product_type_id == 1)
                                    <td>General</td>
                                    @elseif($item->product_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                       
                                    <td>{{$item->category[0]->name??''}}</td>
                                    <td>{{ $item->subCategory[0]->name??'' }}</td>
                                    <td>{{ $item->subChildCategory[0]->name??'' }}</td>

                                    <td>
                                        @can('view-'.str_slug('Product'))
                                            <a href="{{ url('/product/product/' . $item->id) }}"
                                               title="View Product">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
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
                            @endforeach --}}
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
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
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
