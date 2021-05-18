@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Product {{ $product->id }}</h3>
                    @can('view-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr><th> Product Type Id </th><td> {{ $product->product_type_id }} </td></tr><tr><th> Category Id </th><td> {{ $product->category_id }} </td></tr><tr><th> Subcategory Id </th><td> {{ $product->subcategory_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

