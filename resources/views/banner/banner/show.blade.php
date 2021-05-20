@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Banner {{ $banner->id }}</h3>
                    @can('view-'.str_slug('Banner'))
                        <a class="btn btn-success pull-right" href="{{ url('/banner') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            {{-- <tr>
                                <th>ID</th>
                                <td>{{ $banner->id }}</td>
                            </tr> --}}
                            <tr>
                                <th> Banner Type </th>
                                @if($banner->banner_type == 1)
                                <td>General</td>
                                @elseif($banner->banner_type == 2)
                                <td>Grocery</td>
                                @endif
                            </tr>
                            <tr>
                                <th> Title </th>
                                <td> {{ $banner->title }} </td>
                            </tr>
                            <tr>
                                <th> Banner </th>
                                @include('includes.image_html',['variable'=>$banner->banner])
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

