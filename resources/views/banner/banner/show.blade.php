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
                                <th> Category Type </th>
                                <td style="word-break: break-all;"> {{ @$banner->category->name }} </td>
                            </tr>
                            <tr>
                                <th> Title </th>
                                <td style="word-break: break-all;"> {{ @$banner->title }} </td>
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

