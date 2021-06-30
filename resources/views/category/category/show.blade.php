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
                            <a href="{{ asset('category/'.$val_url) }}">
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
                    <h3 class="box-title pull-left">Category {{ $category->id }}</h3>
                    @can('view-'.str_slug('Category'))
                        <a class="btn btn-success pull-right" href="{{ url('/category/category') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            {{-- <tr>
                                <th>ID</th>
                                <td>{{ $category->id??"" }}</td>
                            </tr> --}}
                            <tr>
                                <th> Category Type </th>
                                @if($category->category_type_id == 1)
                                <td>General</td>
                                @elseif($category->category_type_id == 2)
                                <td>Grocery</td>
                                @endif
                            </tr>
                            {{-- <tr>
                                <th> Level Name </th>
                                <td> {{ $category->level_name??"" }} </td>
                            </tr> --}}
                            <tr>
                                <th> Name </th>
                                <td style="word-break: break-all; "> {{ $category->name??"" }} </td>
                            </tr>
                            {{-- <tr>
                                <th> URL Name </th>
                                <td> {{ $category->url_name??"" }} </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $category->description??"" }} </td>
                            </tr> --}}
                            <tr>
                                <th> Banner </th>
                                @include('includes.image_html',['variable'=>$category->banner])
                            </tr>
                            <tr>
                                <th> Status </th>
                               
                                @include('includes.status_badge_html',['variable'=>$category->status])
                            </tr>
                     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

