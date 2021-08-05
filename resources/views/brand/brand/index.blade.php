@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
          <style>
            .wrap{
                word-break: break-all; 
            }
            #myTable_filter input{
            border-color: #6f6f6f !important;
        }

        .zoom {
                transition: transform 1s;
            }

            .add{
                filter: blur(4px);
            }

            .zoom:hover {
                transform: scale(2);
                /* filter: blur(4px); */
                width: 200px;
                height: 200px;
                margin: 0 auto;
            }
        </style>
@endpush

@section('content')
    <div class="container-fluid">
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
                            <a href="{{ asset($val_url) }}">
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
                    <h3 class="box-title pull-left">Brands</h3>
                    @can('add-'.str_slug('Brand'))
                        <a class="btn btn-success pull-right" href="{{ url('/brand/create') }}"><i
                                    class="icon-plus"></i> Add Brand</a>
                    @endcan
                    <div class="clearfix">
                    <button style="margin-bottom: 10px;margin-right: 10px;" class="btn btn-primary pull-right delete_all"  id="delete_all" data-url="{{ url('deleteAllBrands') }}">Delete All Selected</button>

                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless data-checkbox table-striped" id="myTable">
                            <thead>
                            <tr >
                                <th class="bs-checkbox " style="width: 36px; "  data-field="0"><div class="th-inner "><label><input id="master" type="checkbox"><span></span></label></div></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brand as $item)
                                <tr class="optionOne">
                                    <td class="bs-checkbox " style="width: 36px; "><label>
                                        <input style="margin-left: 5px;" data-index="0" class="sub_chk" data-id="{{$item->id}}" type="checkbox">
                                        <span></span>
                                        </label>
                                    </td>
                                    <td>{{ $loop->iteration ?? $item->id }}</td>
                                    <td class="wrap">{{ $item->name }}</td>
                                   
                                        @include('includes.image_html',['variable'=>$item->logo])
                                    
                                    <td>
                                        @can('view-'.str_slug('Brand'))
                                            <a href="{{ url('/brand/' . $item->id) }}"
                                               title="View Brand">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Brand'))
                                            <a href="{{ url('/brand/' . $item->id . '/edit') }}"
                                               title="Edit Brand">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Brand'))
                                            {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => ['/brand', $item->id],
                                       'style' => 'display:inline'
                                   ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Brand',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        @endcan
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $brand->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

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
                console.log(checked.length);
                if(checked.length < 1){
                    $('#delete_all').hide();
                }
                $.each(checked, function() {
                    if(checked.length > 0){
                        console.log('yes');
                        $('#delete_all').show();
                    }else if(checked.length < 1){
                        console.log('no');

                        $('#delete_all').hide();
                    }
                
                });
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
                                        location.reload();
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