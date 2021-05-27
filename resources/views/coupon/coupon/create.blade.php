@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Coupon</h3>
                    @can('view-'.str_slug('Coupon'))
                        <a class="btn btn-success pull-right" href="{{url('/coupon')}}">
                            <i class="icon-arrow-left-circle"></i> View Coupon</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    {{-- @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif --}}

                    {!! Form::open(['name'=>"myform",'url' => '/coupon', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('coupon.coupon.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

