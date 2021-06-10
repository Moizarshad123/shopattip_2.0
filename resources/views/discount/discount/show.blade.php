@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Discount {{ $discount->id }}</h3>
                    @can('view-'.str_slug('Discount'))
                        <a class="btn btn-success pull-right" href="{{ url('/discount') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ @$discount->id }}</td>
                            </tr>
                            <tr>
                                <th> Product Type </th>
                                    @if(@$discount->product_type_id == 1)
                                    <td>General</td>
                                    @elseif(@$discount->product_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                            </tr>
                            <tr>
                                <th> Category </th>
                                <td style="word-break: break-all;"> {{ $discount->category[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Subcategory </th>
                                <td style="word-break: break-all;"> {{ $discount->subCategory[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Child Subcategory </th>
                                <td style="word-break: break-all;"> {{ $discount->subChildCategory[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Disount Type </th>
                                <td style="word-break: break-all;"> {{ $discount->disount_type??'' }} </td>
                            </tr>
                            <tr>
                                <th> Disount Title </th>
                                <td style="word-break: break-all;"> {{ $discount->discount_title??'' }} </td>
                            </tr>
                            <tr>
                                <th> Discount </th>
                                <td style="word-break: break-all;"> {{ $discount->discount??'0' }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

