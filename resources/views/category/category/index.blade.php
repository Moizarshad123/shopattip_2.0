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
        @if ($message = Session::get('flash_message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Categories</h3>
                    @can('add-'.str_slug('Category'))
                        <a class="btn btn-success pull-right" href="{{ url('/category/category/create') }}"><i
                                    class="icon-plus"></i> Add Category</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Type</th>
                                {{-- <th>Level Name</th> --}}
                                <th >Name</th>
                                <th>Banner</th>
                                <th>Stats</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    {{-- <td>{{ $item->category_type_id }}</td> --}}
                                    @if($item->category_type_id == 1)
                                    <td>General</td>
                                    @elseif($item->category_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                                    {{-- <td>{{ $item->level_name }}</td> --}}
                                    <td class="wrap">{{ $item->name??'' }}</td>
                                    @include('includes.image_html',['variable'=>$item->banner??''])
                                    @include('includes.status_badge_html',['variable'=>$item->status??''])
                                    <td>
                                        @can('view-'.str_slug('Category'))
                                            <a href="{{ url('/category/category/' . $item->id) }}"
                                               title="View Category">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Category'))
                                            <a href="{{ url('/category/category/' . $item->id . '/edit') }}"
                                               title="Edit Category">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Category'))
                                            <form method="POST"
                                                  action="{{ url('/category/category' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Category"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div> --}}
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
