@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                $uri            = Route::currentRouteName();
                $ruta_explode   = explode('.',$uri);
                $last_array     = $ruta_explode[0];
            ?>
    
                <ol class="breadcrumb" style="background-color: #fffefe;">
                    <?php $val_url = ''?>
                    <li><a href="{{asset('/dashboard')}}"><i class="entypo-folder"></i> DASHBOARD</a></li>
                    @if(isset($ruta_explode) && count($ruta_explode)>0)
                        @foreach ($ruta_explode as $val)
                        <?php $val_url .= $val ?>
                        <li>
                            @if($last_array == $val_url)
                            <a href="{{ asset($val_url) }}">
                                {{ ucfirst($val) }}
                            </a>
                            @else
                                {{ ucfirst($val) }}
                            @endif
                        </li>
                        <?php $val_url .= '/'?>
                        @endforeach
                    @endif
                </ol>
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New Coupon</h3>
                    @can('view-'.str_slug('Coupon'))
                        <a class="btn btn-success pull-right" href="{{url('/coupon')}}">
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

                    {!! Form::open(['name'=>"myform",'url' => '/coupon', 'id'=>'choice_form' ,'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('coupon.coupon.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

