@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
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
                    <h3 class="box-title pull-left">Brand {{ $brand->id }}</h3>
                    @can('view-'.str_slug('Brand'))
                        <a class="btn btn-success pull-right" href="{{ url('/brand') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            {{-- <tr>
                                <th>ID</th>
                                <td>{{ $brand->id }}</td>
                            </tr> --}}
                            <tr>
                                <th> Brand Type </th>
                                    @if($brand->brand_type_id == 1)
                                    <td>General</td>
                                    @elseif($brand->brand_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                            </tr>
                                    
                            <tr>
                                <th> Name </th>
                                <td style="word-break: break-all; "> {{ $brand->name }} </td>
                            </tr>
                            <tr>
                                <th> Logo </th>
                                @include('includes.image_html',['variable'=>$brand->logo])

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

