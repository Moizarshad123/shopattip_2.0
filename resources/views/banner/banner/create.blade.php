@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Banner</h3>
                    @can('view-'.str_slug('Banner'))
                        <a class="btn btn-success pull-right" href="{{url('/banner')}}">
                            <i class="icon-arrow-left-circle"></i> Back</a>
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

                    {!! Form::open(['url' => '/banner', 'id'=>'create' ,'class' => 'form-horizontal', 'files' => true]) !!}
                        @csrf
                    @include ('banner.banner.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
