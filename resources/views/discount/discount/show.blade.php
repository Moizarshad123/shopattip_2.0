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
                                <td>{{ $discount->id }}</td>
                            </tr>
                            <tr><th> Category Type </th><td> {{ $discount->category_type }} </td></tr><tr><th> Disount Type </th><td> {{ $discount->disount_type }} </td></tr><tr><th> Discount </th><td> {{ $discount->discount }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

