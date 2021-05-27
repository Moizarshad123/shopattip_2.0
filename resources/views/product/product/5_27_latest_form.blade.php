@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.1/tagify.css" />  
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}"  />


{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/> --}}
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
        margin-left: 320px;
        margin-top: 50px !important;
        display: block;
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

<div class="form-group {{ $errors->has('product_type_id') ? 'has-error' : ''}}">
    <label for="product_type_id" class="col-md-4 control-label">{{ 'Product Type' }}</label>
    <div class="col-md-6">
        <input type="radio" name="product_type_id"  id="product_type_id" value="1" @if(old('product_type_id') == 1) checked @endif required> GENERAL 
        <input type="radio" name="product_type_id" id="product_type_id" value="2" @if(old('product_type_id') == 2) checked @endif style="margin-left: 51px;" required> GROCERY
        {!! $errors->first('product_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="category_id"  required disabled='true' > 

        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
    <label for="subcategory_id" class="col-md-4 control-label">{{ 'Subcategory' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="subcategory_id" id="subcategory_id" required disabled='true'> 

            
        </select>
        {!! $errors->first('subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('child_subcategory_id') ? 'has-error' : ''}}">
    <label for="child_subcategory_id" class="col-md-4 control-label">{{ 'Child Subcategory' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="child_subcategory_id" id="child_subcategory_id" required disabled='true'> 

            
        </select>
        {!! $errors->first('child_subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name')}}" required maxlength="50"/>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="col-md-4 control-label">{{ 'Brand' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="brand_id" id="brand_id" required > 
            <option value="" >Select Brand</option>
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" {{ (old("brand_id") == $brand->id ? "selected":"") }} >{{ $brand->name }}</option>
            @endforeach
       
        </select>
        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    <label for="tags" class="col-md-4 control-label">{{ 'Tags' }}</label>
    <div class="col-md-6">
        <input name="tags[]" type="text" id="tags"  placeholder="Type and hit enter to add a tag"  />
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="text" id="description" required>{{ old('description')}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<h4 style="font-weight: bold">Add Images</h4>
<div class="form-group {{ $errors->has('front_image') ? 'has-error' : ''}}">
    <label for="front_image" class="col-md-4 control-label">{{ 'Front Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="front_image" type="file" id="img_file" onChange="img_pathUrl(this);" value="{{ old('front_image')}}"  required>
        {!! $errors->first('front_image', '<p class="help-block">:message</p>') !!}
    </div>
    <img id="img_url" src="" alt="your image" />
</div>
<div class="form-group {{ $errors->has('thumbnail_image') ? 'has-error' : ''}}">
    <label for="thumbnail_image" class="col-md-4 control-label">{{ 'Thumb-nail Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" multiple name="thumbnail_image[]" type="file" id="thumbnail_img" value="{{ old('thumbnail_images')}}"  required>
        {!! $errors->first('thumbnail_image', '<p class="help-block">:message</p>') !!}
    </div>
    {{-- <img id="thumbnail_img_url" src="" alt="your image" /> --}}
    
    <div class="row col-md-12 imgPreview" >


        <div class="form-group col-md-2">
            <img src="" id="thumbnail0" alt="" width="100" height="">
        </div>
        <div class="form-group col-md-2">
            <img src="" id="thumbnail1" alt="" width="100" height="">
        </div>
        <div class="form-group col-md-2">
            <img src="" id="thumbnail2" alt="" width="100" height="">
        </div>
        <div class="form-group col-md-2">
            <img src="" id="thumbnail3" alt="" width="100" height="">
        </div>
        <div class="form-group col-md-2">
            <img src="" id="thumbnail4" alt="" width="100" height="">
        </div>
    </div>
</div>
{{-- <h4 style="font-weight: bold">Add Variation</h4>
@php $count=1; @endphp
<div class="new-wrap" >

</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="text-align: center;">#</th>
            <th style="text-align: center;">Color</th>
            <th style="text-align: center;">Qty</th>
            <th style="text-align: center;">Price</th>
            <th style="text-align: center;">Action</th>

        </tr>
    </thead>
    <tbody id="addData" class="main">
        @php $count=1; @endphp
        <tr>
            <td>{{ $count++ }}</td>
            <td>
                <select class="color-choose"  name="colors[]" id="colors" >
                    <option value="">Select Color</option>
                    @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
                        <option  value="{{ $color->color_code }} ">  {{ ' '.$color->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" class="form-control" name="qty[]">
            </td>
            <td>
                <input type="number" class="form-control" name="price[]">
            </td>
            <td style="text-align: center;">
                <i class="fa fa-trash"></i>
            </td>

        </tr>
    </tbody>

    <tr id="wrapnew" >
        <td>2</td>
        <td>
            <select class="select2"  name="colors[]" id="colors" >
                <option value="">Select Color</option>
                @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
                    <option  value="{{ $color->color_code }} ">  {{ ' '.$color->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control" name="qty[]">
        </td>
        <td>
            <input type="number" class="form-control" name="price[]">
        </td>
        <td style="text-align: center;">
            <i class="fa fa-trash"></i>
        </td>
    
    </tr>

    
</table>
<a href="javascript:void(0)" data-name="active" style="float: right;font-size: 30px;" id="addRows">
    <i class="fa fa-plus-circle"></i>
</a> --}}
<h4 style="font-weight: bold">Add Variation</h4>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="col-md-4 control-label">{{ 'Size' }}</label>
    <div class="col-md-6">
        <input class=" " name="size[]" type="text" id="size" value="{{ old('size[]')}}"  placeholder="Type and hit enter to add Size"  maxlength="10" />
        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('fabric') ? 'has-error' : ''}}">
    <label for="fabric" class="col-md-4 control-label">{{ 'Fabric' }}</label>
    <div class="col-md-6">
        <input class=" " name="fabric[]" type="text" id="fabric" value="{{ old('fabric[]')}}"  placeholder="Type and hit enter to add Fabric"  maxlength="10"  />
        {!! $errors->first('fabric', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('colors') ? 'has-error' : ''}}">
    <label for="colors" class="col-md-4 control-label">{{ 'Colors' }}</label>
    <div class="col-md-6">
        <select class="color-choose color_table" data-live-search="true" data-selected-text-format="count" required name="colors[]" id="colors" multiple disabled >
            @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
                <option  value="{{ $color->color_code }}">  {{ ' '.$color->name }}</option>
            @endforeach
        </select>

        {!! $errors->first('colors', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-0">
        <label class="aiz-switch aiz-switch-success mb-0">
            <input value="1" type="checkbox" name="colors_active" >
            <span></span>
        </label>
    </div>
</div>
<br>

{{-- <div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    <label for="options" class="col-md-4 control-label">{{ 'Options' }}</label>
    <div class="col-md-6">
      
        <select name="choice_attributes[]" id="choice_attributes" class="form-control attribute-choose" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="Choose Attributes"  >
            @foreach (\App\Attribute::all() as $key => $attribute)
            <option value="{{ $attribute->name }}">{{ $attribute->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br> --}}

{{-- <div>
    <p>Choose the attributes of this product and then input values of each attribute</p>
    <br>
</div> --}}

<div class="customer_choice_options attribute_table" id="customer_choice_options">

</div>
<br>
<div class="sku_combination" id="sku_combination"  style="    margin-left: 262px !important;
margin-right: 120px !important;">

</div>

<div class="form-group {{ $errors->has('sale_price') ? 'has-error' : ''}}">
    <label for="sale_price" class="col-md-4 control-label">{{ 'Sale Price' }}</label>
    <div class="col-md-6">
        <input class="form-control sale_price" name="sale_price"  type="number" id="sale_price" placeholder="0" value="{{ old('sale_price')}}"  required maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dollor') ? 'has-error' : ''}}">
    <label for="dollor" class="col-md-4 control-label">{{ 'Dollor' }}</label>
    <div class="col-md-6">
        <input class="form-control dollor" name="dollor" type="number" id="dollor" placeholder="0" value="{{ old('dollor')}}"  readonly>
        {!! $errors->first('dollor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('riyal') ? 'has-error' : ''}}">
    <label for="riyal" class="col-md-4 control-label">{{ 'Riyal' }}</label>
    <div class="col-md-6">
        <input class="form-control riyal" name="riyal" type="number" id="riyal" placeholder="0" value="{{ old('riyal')}}"  readonly>
        {!! $errors->first('riyal', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dinar') ? 'has-error' : ''}}">
    <label for="dinar" class="col-md-4 control-label">{{ 'Dinar' }}</label>
    <div class="col-md-6">
        <input class="form-control dinar" name="dinar" type="number" id="dinar" placeholder="0" value="{{ old('dinar')}}"  readonly>
        {!! $errors->first('dinar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('perchase_price') ? 'has-error' : ''}}">
    <label for="perchase_price" class="col-md-4 control-label">{{ 'Perchase Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="perchase_price" type="number" id="perchase_price" placeholder="0" value="{{ old('perchase_price')}}"  required maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('perchase_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="col-md-4 control-label">{{ 'Discount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="discount" type="text" id="discount" placeholder="0" value="{{ old('discount')}}"  required maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount_type') ? 'has-error' : ''}}">
    <label for="discount_type" class="col-md-4 control-label">{{ 'Discount Type' }}</label>
    <div class="col-md-6">
        <select class="form-control select2" name="discount_type" id="discount_type" >
            <option value=""> Select Discount Type</option>
            <option value="flat" @if (old('discount_type') == 'flat') selected="selected" @endif>Flat</option>
            <option value="percent" @if (old('discount_type') == 'percent') selected="selected" @endif>Percent</option>
        </select>
        {!! $errors->first('discount_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="card-header">
    <h1 class="mb-0 h6"><strong>Product Shipping Cost</strong></h1>
</div>
<div class="container">
    <div class="form-group row">
        <div class="col-md-2">
            <h5 class="mb-0 h6">Free Shipping</h5>
        </div>
        <div class="col-md-10">
            <div class="form-group row">
                <label class="col-md-2 col-from-label">Status</label>
                <div class="col-md-10">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="radio" name="shipping_type" id="shipping_type_free" value="free" checked>
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2">
            <h5 class="mb-0 h6">Flat Rate</h5>
        </div>
        <div class="col-md-10">
            <div class="form-group row">
                <label class="col-md-2 col-from-label">Status</label>
                <div class="col-md-10">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="radio" name="shipping_type" id="shipping_type_flat_rate" value="flat_rate" checked>
                        <span></span>
                    </label>
                </div>
            </div>
          
        </div>

    </div>
</div> --}}
<div class="form-group {{ $errors->has('shipping_cost') ? 'has-error' : ''}}" id="flat_shipping_cost">
    <label for="shipping_cost" class="col-md-4 control-label">{{ 'Shipping Cost' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shipping_cost" type="number" id="shipping_cost" placeholder="0" value="{{ old('shipping_cost')}}"  maxlength="10" required oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('shipping_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{$errors->has('commission') ? 'has-error' : ''}}" >
    <label for="commission" class="col-md-4 control-label">{{ 'Commission' }}</label>
    <div class="col-md-6">
        <input class="form-control"  name="commission" type="number" id="commission" placeholder="0" value="{{ old('commission')}}"  maxlength="10" required oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' >
        {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>
<div id="hnb">
@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.1.1/tagify.min.js"></script>

{{-- <script src="{{ asset('vendor/js/forms/select/select2.full.min.js') }}"></script> --}}

<script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js" integrity="sha512-VjRpiWhUqdNa9bwBV7LnlG8CwsCVPenFyOQTSRTOGHw/tjtME96zthh0Vv9Itf3i8w4CkUrdYaS6+dAt1m1YXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/a-color-picker@1.1.8/dist/acolorpicker.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script>

    function img_pathUrl(input){
        
        $('#img_url').show();
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

    function readURL(input,id,i){ 
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                $('#'+id).attr('src', e.target.result).css({"height": "100", "margin-left": "280px","margin-top":"10px"});
                }

                reader.readAsDataURL(input.files[i]); // convert to base64 string
            }
    }

    var _URL = window.URL || window.webkitURL;
        $("#thumbnail_img").change(function(e) {

        var file, img;
        for(let i = 0; i<this.files.length;i++){
            if ((file = this.files[i])) {
                img = new Image();
                img.src = _URL.createObjectURL(file);


            }
            readURL(this,'thumbnail'+i,i);
        }

    });

    $('#shipping_type_free').click(function(){
        $('#flat_shipping_cost').hide();
    });
    $('#shipping_type_flat_rate').click(function(){
        $('#flat_shipping_cost').show();
    });



        
    $(document).ready(function () {

        $('#sale_price').keyup(function(){

           
            var sale_price = $('#sale_price').val();
            var dollor = 160 ;
            var dinar = 515 ;
            var riyal = 42 ;
            var prk_to_dollor = (sale_price/dollor);
            var prk_to_dinar = (sale_price/dinar);
            var prk_to_riyal = (sale_price/riyal);
            $('#dollor').val(prk_to_dollor.toFixed(2));
            $('#dinar').val(prk_to_dinar.toFixed(2));
            $('#riyal').val(prk_to_riyal.toFixed(2));

        });
        
        $('#img_url').hide();
        $("#category_id,#subcategory_id,#child_subcategory_id,#brand_id,#discount_type").select2();
      

        $(document).on('change','#product_type_id',function(){
            var product_type_id = $(this).val();
            var option = '';
            if(product_type_id != null){
                $.ajax({
                type: 'GET',
                url: "{{url('get-category-by-select-product-type')}}/" +product_type_id,
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',

                beforeSend: function() {
                    // setting a timeout
                    
                },
                success: function(response) {
                    console.log(response);
                    $("#category_id").prop('disabled', false);
                    console.log(response);
                    var option = '<option value=""> Select Category</option>';
                    $.each(response,function(index,row){
                        

                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    
                    })
                
                    $("#category_id").empty();
                    $("#category_id").append(option);
                    
                    
                
                },
                error: function(xhr) { // if error occured
                
                },

                });
            }else{
                alert('Select any type');
            }
        });

        $(document).on('change','#category_id',function(){
            var category_type_id = $(this).val();
            
            var option = '';
            if(product_type_id != null){
                $.ajax({
                type: 'GET',
                url: "{{url('get-subcategory-by-select-category-type')}}/" +category_type_id,
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',

                beforeSend: function() {
                    // setting a timeout
                    
                },
                success: function(response) {
                    $("#subcategory_id").prop('disabled', false);
                    console.log(response);
                    var option = '<option value=""> Select SubCategory</option>';
                    $.each(response,function(index,row){
                        

                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    
                    })
                
                    $("#subcategory_id").empty();
                    $("#subcategory_id").append(option);
                    
                    
                
                },
                error: function(xhr) { // if error occured
                
                },

                });
            }else{
                alert('Select any category');
            }
        });

        $(document).on('change','#subcategory_id',function(){
            var subcategory_type_id = $(this).val();
            var option = '';
            if(subcategory_type_id != null){
                $.ajax({
                type: 'GET',
                url: "{{url('get-childSubcategory-by-select-subcategory-type')}}/" +subcategory_type_id,
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',

                beforeSend: function() {
                    // setting a timeout
                    
                },
                success: function(response) {
                    $("#child_subcategory_id").prop('disabled', false);
                    console.log(response);
                    var option = '<option value=""> Select Child SubCategory</option>';
                    $.each(response,function(index,row){
                        

                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    
                    })
                
                    $("#child_subcategory_id").empty();
                    $("#child_subcategory_id").append(option);
                    
                    
                
                },
                error: function(xhr) { // if error occured
                
                },

                });
            }else{
                alert('Select any category');
            }
        });

        function formatState (state) {
            if (!state.id) { return state.text; }

            var $state = $('<span><span class="size-15px d-inline-block mr-2 rounded border" style="background:' + state.element.value + ';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>' + state.text + '</span></span>');
            return $state;
        };

        $(".color-choose").select2({
            width: "100%",
            templateResult: formatState
        });

        $(".attribute-choose").select2({

            width: "100%",
                
        });



        $(".form-control select2").select2({
            width: "100%",
        });


        $('input[name="colors_active"]').on('change', function() {
            if(!$('input[name="colors_active"]').is(':checked')){
                $('#colors').prop('disabled', true);
            }
            else{
                $('#colors').prop('disabled', false);
            }

        });

        $('#colors').on('change', function() {
            update_sku();
        });

        // $('input[name="sale_price"]').on('keyup', function() {
        //     update_sku();
        // });

        $(document).on("keyup", ".aiz-tag-input ajax", function(){
            alert("here");

        });

        $('input[name="name"]').on('keyup', function() {
            update_sku();
        });

        function delete_row(em){
            $(em).closest('.form-group row').remove();
            update_sku();
        }

        function delete_variant(em){
            $(em).closest('.variant').remove();
        }


        $('#choice_attributes').on('change', function() {
           
            $('#customer_choice_options').html(null);
            var count = 1;
            $.each($("#choice_attributes option:selected"), function(){
                var value = $(this).val();
                var text = $(this).text();

                $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+value+'"><input type="text" class="form-control" name="choice[]" value="'+text+'" placeholder="Choice Title" readonly></div><div class="col-md-8"><input type="text" id="option_change" class="form-control aiz-tag-input attribute-values-'+count+'"" name="choice_options_'+value+'[]" data-on-change="update_sku" placeholder="Enter choice values" ></div></div>');
                count++;
            
            });
           
                update_sku();
                var input = document.querySelector('.attribute-values-1');
                var tagify = new Tagify(input);
                tagify.addTags();
            

                setTimeout(function() {
                    var input = document.querySelector('.attribute-values-2');
                    var tagify = new Tagify(input);
                    tagify.addTags();
                }, 1000);

        }); 

 
        $("div").delegate(".attribute-values-1", "change", function(){
            update_sku();
        });
        $("div").delegate(".attribute-values-2", "change", function(){
            update_sku();
        });

        $(".attribute-values").select2({
            width: "100%",
            
        });

        $(document).on('click','.delete_variant', function(){

            var values = $('.color_table option:selected').text();
            $(this).closest('.variant').remove();

        });
                
        function update_sku(){
          $.ajax({
          type:"POST",
          url:"{{ route('admin.products.sku-combination') }}",

          data:$('#choice_form').serialize(),
          beforeSend: function(){

            },
              success: function(data){
              $('#sku_combination').html(data);
              if (data.length > 1) {
                  $('#quantity').hide();
              }
              else {
                    $('#quantity').show();
              }
            }
            });
        }

        $('input[name="colors_active"]').on('change', function() {
            if(!$('input[name="colors_active"]').is(':checked')){
                $('#colors').prop('disabled', true);
                $('#color_append_table').hide();
            }
            else{
                $('#colors').prop('disabled', false);
                var length = $('#count').val();
                if(length > 0){
                    $('#color_append_table').show();
                }
                
            }

        });



        var tags = document.querySelector('#tags');
        var size = document.querySelector('#size');
        var fabric = document.querySelector('#fabric');
        // create a Tagify component
        var tagify = new Tagify(tags, {
            whitelist: [],
            maxTags: 15,
            dropdown: {
                maxItems: 5,           
                classname: "tags-look",
                enabled: 0,            
                closeOnSelect: true,   
                required:true
            }
        });
        var tagify = new Tagify(size, {
            whitelist: [],
            maxTags: 15,
            dropdown: {
                maxItems: 5,           
                classname: "tags-look", 
                enabled: 0,           
                closeOnSelect: true    
            }
        });
        var tagify = new Tagify(fabric, {
            whitelist: [],
            maxTags: 15,
            dropdown: {
                maxItems: 5,           
                classname: "tags-look", 
                enabled: 0,             
                closeOnSelect: true   
            }
        });
        // var input = document.querySelector('#size');
        // var tagify = new Tagify(input);
        // tagify.addTags();
        // var input = document.querySelector('#fabric');
        // var tagify = new Tagify(input);
        // tagify.addTags();
          
    });
  
</script>

@endpush

