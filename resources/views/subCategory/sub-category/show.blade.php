@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">SubCategory {{ $subcategory->id }}</h3>
                    @can('view-'.str_slug('SubCategory'))
                        <a class="btn btn-success pull-right" href="{{ url('/subcategory/sub-category') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $subcategory->id }}</td>
                            </tr>
                            <tr><th> Category Id </th><td> {{ $subcategory->category_id }} </td></tr><tr><th> Name </th><td> {{ $subcategory->name }} </td></tr><tr><th> Url Name </th><td> {{ $subcategory->url_name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

