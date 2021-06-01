@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
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
                <div class="white-box">
                    <h3 class="box-title pull-left">Discount</h3>
                    @can('add-'.str_slug('Discount'))
                        <a class="btn btn-success pull-right" href="{{ url('/discount/create') }}"><i
                                    class="icon-plus"></i> Add Discount</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="myTable">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Category Type</th>
                                <th style="text-align: center;">Disount Type</th>
                                <th style="text-align: center;">Discount</th>
                                <th style="text-align: center;">Start Date</th>
                                <th style="text-align: center;">End Date</th>
                                <th style="text-align: center;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp
                            @foreach($discount as $item)
                                <tr>
                                    <td style="text-align: center;">{{ ++$count }}</td>
                                    <td style="text-align: center;">{{ $item->category[0]->name??'' }}</td>
                                    <td style="text-align: center;">{{ $item->disount_type }}</td>
                                    <td style="text-align: center;">{{ $item->discount }}</td>
                                    <td style="text-align: center;">{{ date('d-m-Y',strtotime($item->start_date)) }}</td>
                                    <td style="text-align: center;">{{ date('d-m-Y',strtotime($item->end_date)) }}</td>

                                    <td>
                                        @can('view-'.str_slug('Discount'))
                                            <a href="{{ url('/discount/' . $item->id) }}"
                                               title="View Discount">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Discount'))
                                            <a href="{{ url('/discount/' . $item->id . '/edit') }}"
                                               title="Edit Discount">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"> </i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Discount'))
                                            {!! Form::open([
                                       'method'=>'DELETE',
                                       'url' => ['/discount', $item->id],
                                       'style' => 'display:inline'
                                   ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Discount',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            )) !!}
                                        @endcan
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $discount->appends(['search' => Request::get('search')])->render() !!} </div> --}}
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