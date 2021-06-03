@extends('layouts.master')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.1/tagify.css" />  
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.css" />
<link rel="stylesheet" href="{{ asset('vendor/css/forms/select/select2.min.css') }}">
<style>
    span.select2-selection.select2-selection--single {
    height: 37px;
    }
    #img_url {
        background: #ddd;
        width: 230px;
        height: 150px;
        /* text-align: center !important; */
  
    }
    #thumbnail_img_url{
        background: #ddd;
        width: 124px;
        height: 82px;
        /* text-align: center !important; */
        margin-left: 320px;
        margin-top: 50px !important;
        display: block;
    }
    .tagify{
        --tag-text-color:#fff !important;
        --tag-hover: #3490dc  !important;
        --tag-bg: #3490dc !important;
        
      
    }
    tag.tagify__tag {
        background-color: #3490dc !important;
        border-color: #3490dc !important;
        color: #fff !important;
      
    }

    .tagify {
        --tags-border-color: #e2e5ec;
        --tag-bg: #7367f0;
        --tag-hover: #7367f0;
        --tag-text-color: #fff;
        --tag-text-color--edit: #212529;
        --tag-pad: 0.3rem 0.5rem;
        --tag-inset-shadow-size: 1.1em;
        --tag-invalid-color: #d39494;
        --tag-invalid-bg: rgba(253, 57, 75, 0.5);
        --tag-remove-bg: rgba(253, 57, 75, 0.3);
        --tag-remove-btn-bg: none;
        --tag-remove-btn-bg--hover: #fd394b;
        --tag--min-width: 1ch;
        --tag--max-width: auto;
        --tag-hide-transition: 0.3s;
        --loader-size: 0.8em;
        }


        /*tagify tag input*/

        .aiz-tag-input {
        height: auto;
        padding: 0.465rem 1rem 0.2rem;
        }
        .aiz-tag-input .tagify__tag,
        .aiz-tag-input .tagify__input {
        margin: 0px 5px 5px 0px;
        }
        .aiz-tag-input .tagify__tag__removeBtn {
        font: 12px Serif;
        line-height: 1.5;
        }
        .aiz-tag-input .tagify__tag__removeBtn:hover + div > span {
        opacity: 1;
        }

        /*switch*/
        .aiz-switch input:empty {
        height: 0;
        width: 0;
        overflow: hidden;
        position: absolute;
        opacity: 0;
        }
        .aiz-switch input:empty ~ span {
        display: inline-block;
        position: relative;
        text-indent: 0;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        line-height: 24px;
        height: 21px;
        width: 40px;
        border-radius: 12px;
        }
        .aiz-switch input:empty ~ span:after,
        .aiz-switch input:empty ~ span:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content: " ";
        -webkit-transition: all 0.1s ease-in;
        transition: all 0.1s ease-in;
        width: 40px;
        border-radius: 12px;
        }
        .aiz-switch input:empty ~ span:before {
        background-color: #e8ebf1;
        }
        .aiz-switch input:empty ~ span:after {
        height: 17px;
        width: 17px;
        line-height: 20px;
        top: 2px;
        bottom: 2px;
        margin-left: 2px;
        font-size: 0.8em;
        text-align: center;
        vertical-align: middle;
        color: #f8f9fb;
        background-color: #fff;
        }
        .aiz-switch input:checked ~ span:after {
        background-color: var(--primary);
        margin-left: 20px;
        }
        .aiz-switch-secondary input:checked ~ span:after {
        background-color: var(--secondary);
        }
        .aiz-switch-success input:checked ~ span:after {
        background-color: var(--success);
        }
        .aiz-switch-info input:checked ~ span:after {
        background-color: var(--info);
        }
        .aiz-switch-warning input:checked ~ span:after {
        background-color: var(--warning);
        }
        .aiz-switch-danger input:checked ~ span:after {
        background-color: var(--danger);
        }
        .aiz-switch-light input:checked ~ span:after {
        background-color: var(--light);
        }
        .aiz-switch-dark input:checked ~ span:after {
        background-color: var(--dark);
        }




/*tagify tag input*/

.aiz-tag-input {
height: auto;
padding: 0.465rem 1rem 0.2rem;
}
.aiz-tag-input .tagify__tag,
.aiz-tag-input .tagify__input {
margin: 0px 5px 5px 0px;
}
.aiz-tag-input .tagify__tag__removeBtn {
font: 12px Serif;
line-height: 1.5;
}
.aiz-tag-input .tagify__tag__removeBtn:hover + div > span {
opacity: 1;
}
</style>
@endpush
@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Product {{ $product->id }}</h3>
                    @can('view-'.str_slug('Product'))
                        <a class="btn btn-success pull-right" href="{{ url('/product/product') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th> Product Type </th>
                                    @if($product->product_type_id == 1)
                                    <td>General</td>
                                    @elseif($product->product_type_id == 2)
                                    <td>Grocery</td>
                                    @endif
                            </tr>
                            <tr>
                                <th> Category </th>
                                <td> {{ $product->category[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Subcategory </th>
                                <td> {{ $product->subCategory[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Child Subcategory </th>
                                <td> {{ $product->subChildCategory[0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $product->name??'null' }} </td>
                            </tr>
                        
                            <tr>
                                <th> Brand </th>
                                <td> {{ $product['brand'][0]->name??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Tags </th>
                                <td><input type="text" id="tags" value="{{ $product->tags??'null' }}" readonly>  </td>
                            </tr>
                            <tr>
                                <th> Description </th>
                                <td> {{ $product->description??'null' }} </td>
                            </tr>
                            <tr>
                                <th> Front Image </th>
                                <td><img id="img_url" src="{{ asset('website/productImages/product_'.$product->id.'_1.jpg') }}" alt="your image" />                                </td>
                            </tr>
                            <tr>
                                <th> Thumb-nail Image </th>
                                <td>
                    
                                        @for ($i =1; $i <= $product->num_of_imgs; $i++)
                                        <div class="form-group col-md-2" >
                                            <img src="{{ asset('website/productImages/product_'.$product->id.'_'.$i.'.jpg') }}" id="thumbnail0" alt="" width="100" height="100">
                                
                                        </div>
                                        @endfor


                               
                                </td>
                            </tr>
                            <tr>
                                <th> Size </th>
                                <td><input type="text" id="size" value="{{ $product->size??'null' }}" readonly>  </td>
                            </tr>
                            <tr>
                                <th> Fabric </th>
                                <td> <input type="text" id="fabric" value="{{ $product->fabric??'null' }} " readonly></td>
                            </tr>
                          

                            <tr>
                                
                                <th> Sale Price </th>
                                <td> {{ @$product->sale_price - @$product->commission }} </td>
                            </tr>
                            {{-- <tr>
                                
                                <th> Dollor </th>
                                <td> {{ $product->dollor??'0' }} </td>
                            </tr>
                            <tr>
                                
                                <th> Riyal </th>
                                <td> {{ $product->riyal??'0' }} </td>
                            </tr>
                            <tr>
                                
                                <th> Dinar </th>
                                <td> {{ $product->dinar??'0' }} </td>
                            </tr>
                            <tr>
                                
                                <th> Euro </th>
                                <td> {{ $product->euro??'0' }} </td>
                            </tr> --}}
                            <tr>
                                <th> Perchase Price </th>
                                <td> {{ $product->purchase_price??"0" }} </td>
                            </tr>
                            <tr>
                                <th> Discount </th>
                                <td> {{ $product->discount??'0' }} </td>
                            </tr>
                            <tr>
                                <th> Discount Type </th>
                                <td> {{ $product->discount_type??'' }} </td>
                            </tr>
                            <tr>
                                <th> Shipping Cost </th>
                                <td> {{ $product->shipping_cost??'0' }} </td>
                            </tr>
                            <tr>
                                <th> Commission </th>
                                <td> {{ $product->commission??'0' }} </td>
                            </tr>
                            <tr>
                                <th> Product Added Date </th>
                                <td> {{ $product->date??'12-12-2012' }} </td>
                            </tr>
                            </tbody>
                        </table>
                        <h2>Product Variaction</h2>
                        <table class="table table-bordered " >
                            <thead>
                                <tr >
                                    <th class="text-center">
                                        <b><label for="" class="control-label">Color</label></b>
                                    </th>
                                    {{-- <td class="text-center">
                                        <label for="" class="control-label">Variant Price</label>
                                    </td> --}}
                    
                                    <th class="text-center">
                                        <b><label for="" class="control-label">Quantity</label></b>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    @foreach ($product['productVariaction'] as $item)
                                    <b>{{  $item->color??'null' }}</b><br><hr>
                                      
                                    @endforeach
                                    </td>

                                    <td>
                                        @foreach ($product['productVariaction'] as $item)
                                       <b>{{  $item->stock??'null' }}</b><br> <hr>
                                          
                                        @endforeach
                                    </td>
                                  
                                </tr>
                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.1.1/tagify.min.js"></script>

<script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/a-color-picker@1.1.8/dist/acolorpicker.js"></script>

<script>





        
    $(document).ready(function () {




        var input = document.querySelector('#tags');
        var tagify = new Tagify(input);
        tagify.addTags();
        var input = document.querySelector('#size');
        var tagify = new Tagify(input);
        tagify.addTags();
        var input = document.querySelector('#fabric');
        var tagify = new Tagify(input);
        tagify.addTags();
        var input = document.querySelector('.color');
        var tagify = new Tagify(input);
        tagify.addTags();
          
    });
  
</script>

@endpush

