@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Slider {{ $slider->id }}</h3>
                    @can('view-'.str_slug('Slider'))
                        <a class="btn btn-success pull-right" href="{{ url('/slider/slider') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $slider->id }}</td>
                            </tr>
                            <tr>
                                <th> Slider Type </th>
                                <td> {{ $slider->slider_type }} </td>
                            </tr>
                            <tr>
                                <th> Title </th>
                                <td> {{ $slider->title }} </td>
                            </tr>
                            <tr>
                                <th> Slider Image </th>
                                @include('includes.image_html',['variable'=>$slider->slider_image])

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

