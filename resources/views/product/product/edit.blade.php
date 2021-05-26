@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Product #{{ $product->id }}</h3>
                    @can('view-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" id="choice_form" action="{{ url('/product/product/update/' . $product->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{-- {{ method_field('PATCH') }} --}}
                        {{ csrf_field() }}
                        {{-- <input type="hidden" name="_method" id="method" value="PUT"> --}}
                    <input type="hidden" name="product_id" value="{{ $product->id }}">  
                      
                        @include ('product.product.update-form', ['submitButtonText' => 'Update'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
