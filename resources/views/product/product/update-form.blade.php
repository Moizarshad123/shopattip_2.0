@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.22.1/tagify.css" />  
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.css" />
<link rel="stylesheet" href="{{ asset('vendor/css/forms/select/select2.min.css') }}">
<style>
    .aiz-switch-success input:checked ~ span:after{
        background-color: #07ed19 !important;
    }
    .aiz-switch input:empty ~ span {
        margin-top: 3px !important;
    }
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
        tags.tagify.tagify--noTags.tagify--empty{
            height: 40px;
        }

        .tagify.tagify--focus{
            border-color: #212529 !important;
        }
        .required
        {
            color: red;
        }

        #sku-error{
            color: red;
        }
</style>
@endpush

<div class="form-group {{ $errors->has('product_type_id') ? 'has-error' : ''}}">
    <label for="product_type_id" class="col-md-4 control-label">{{ 'Product Type' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <b><input type="radio" name="product_type_id" id="product_type_id" value="1" {{(@$product->product_type_id==1) ? "checked" :''}}> GENERAL </b>
        <b><input type="radio" name="product_type_id" id="product_type_id" value="2" style="margin-left: 51px;"  {{(@$product->product_type_id==2) ? "checked" :''}}> GROCERY </b>
        {!! $errors->first('product_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="category_id" required > 
            @foreach($Categories as $Category)

            <option value="{{ $Category->id }}" {{(  $Category->id == $product->category_id) ? 'selected="true"':'' }}>(Category) <strong>{{ $Category->name }}</strong></option>

            @endforeach
        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
    <label for="subcategory_id" class="col-md-4 control-label">{{ 'Subcategory' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <select  class="form-control" name="subcategory_id" id="subcategory_id" required > 
            @foreach($subCategories as $subCategory)
            <option value="{{ $subCategory->id }}" {{(  $subCategory->id == $product->subcategory_id) ? 'selected="true"':'' }}>(SubCategory) <strong>{{ $subCategory->name }}</strong></option>

            @endforeach
            
        </select>
        {!! $errors->first('subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('child_subcategory_id') ? 'has-error' : ''}}">
    <label for="child_subcategory_id" class="col-md-4 control-label">{{ 'Child Subcategory' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <select  class="form-control" name="child_subcategory_id" id="child_subcategory_id" required> 
            @foreach($childSubCategories as $shildsubCategory)
            <option value="{{ $shildsubCategory->id }}" {{(  $shildsubCategory->id == $product->child_subcategory_id) ? 'selected="true"':'' }}>(Child SubCategory) <strong>{{ $shildsubCategory->name }}</strong></option>

            @endforeach
            
        </select>
        {!! $errors->first('child_subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $product->name?? ''}}" maxlength="45"/>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sku') ? 'has-error' : ''}}">
    <label for="sku" class="col-md-4 control-label">{{ 'SKU' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input class="form-control " name="sku" type="text" id="sku" value="{{ $product->sku?? ''}}"  readonly maxlength="10" placeholder="SKU" size="10" style="text-transform:uppercase"/>
        {!! $errors->first('sku', '<p class="help-block">:message</p>') !!}
        <span id="sku-error"></span>
    </div>
    <div class="col-md-0">
        <label class="" style="margin-top: 7px;">
            <input type="button" id="getit" class="button" value="Generate"  >
            <span></span>
        </label>
    </div>
</div>
<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="col-md-4 control-label">{{ 'Brand' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <select  class="form-control" name="brand_id" id="brand_id" required> 
            <option value="" >Select Brand</option>
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" {{(  $brand->id == $product->brand_id) ? 'selected="true"':'' }}>{{ $brand->name }}</option>

            @endforeach
       
        </select>
        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    <label for="tags" class="col-md-4 control-label">{{ 'Tags' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input  name="tags[]" type="text" id="tags" value="{{ $product->tags?? ''}}" placeholder="Type and hit enter to add a tag"  />
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="text" id="description" required maxlength="300">{{ $product->description?? ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<h4 style="font-weight: bold">Add Images</h4>
<div class="form-group {{ $errors->has('front_image') ? 'has-error' : ''}}">
    <label for="front_image" class="col-md-4 control-label custom-file-label" id="imgLabel">{{ 'Front Image' }}<span class="required"> *</span></label>
  
    <div class="col-md-6">
        <input class="form-control" name="front_image" type="file" id="img_file" value="{{ asset('website/productImages/product_'.$product->id.'_1.jpg') }}" required>
        {!! $errors->first('front_image', '<p class="help-block">:message</p>') !!}
    </div>
    <img id="img_url" src="{{ asset('website/productImages/product_'.$product->id.'_1.jpg') }}" alt="your image" style="display: block !important" />
  

</div>
<div class="form-group {{ $errors->has('thumbnail_image') ? 'has-error' : ''}}">
    <label for="thumbnail_image"  id="imgLabel"class="col-md-4 control-label tom-file-label">{{ 'Thumb-nail Image' }}<span class="required"> *</span></label>
  

    <div class="col-md-6">
        <input class="form-control" multiple name="thumbnail_image[]" type="file" id="thumbnail_img" value="{{ $product->front_image?? ''}}" required>
        {!! $errors->first('thumbnail_image', '<p class="help-block">:message</p>') !!}
    </div>
    {{-- <img id="thumbnail_img_url" src="" alt="your image" /> --}}
    
    <div class="row col-md-12" style="height:100;margin-left:280px; margin-top:10px">
        @php  $number = 0; @endphp
        @for ($i =1; $i <= $product->num_of_imgs; $i++)
       
        <div class="form-group col-md-2" >
            <img src="{{ asset('website/productImages/product_'.$product->id.'_'.$i.'.jpg') }}" id='thumbnail{{ $number }}' alt="" width="100" height="100">

        </div>
        @php  $number++ @endphp
        @endfor
        {{-- <div class="form-group col-md-2" >
            <img src="{{ asset('website/productImages/product_'.$product->id.'_1.jpg') }}" id="thumbnail0" alt="" width="100" height="">

        </div>
        <div class="form-group col-md-2">
            <img src="{{ asset('website/productImages/product_'.$product->id.'_2.jpg') }}" id="thumbnail1" alt="" width="100" height="">

        </div>
        <div class="form-group col-md-2">
            <img src="{{ asset('website/productImages/product_'.$product->id.'_3.jpg') }}" id="thumbnail2" alt="" width="100" height="">

        </div>
        <div class="form-group col-md-2">
            <img src="{{ asset('website/productImages/product_'.$product->id.'_4.jpg') }}" id="thumbnail3" alt="" width="100" height="">

        </div>
        <div class="form-group col-md-2">
            <img src="{{ asset('website/productImages/product_'.$product->id.'_5.jpg')??"" }}" id="thumbnail4" alt="" width="100" height="">

        </div> --}}
    </div>
</div>
<h4 style="font-weight: bold">Add Variation</h4>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="col-md-4 control-label">{{ 'Size' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input  name="size[]" type="text" id="size" value="{{ $product->size?? ''}}" placeholder="Type and hit enter to add size"  />
        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fabric') ? 'has-error' : ''}}">
    <label for="fabric" class="col-md-4 control-label">{{ 'Fabric' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input  name="fabric[]" type="text" id="fabric" value="{{ $product->fabric?? ''}}" placeholder="Type and hit enter to add fabric"  />
        {!! $errors->first('fabric', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('colors') ? 'has-error' : ''}}">
    <label for="colors" class="col-md-4 control-label">{{ 'Colors' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        @if(@$product->colors != null )
        {{-- <input type="text" name="colors" id="colors" class="form-control"> --}}
        <select class="color-choose color_table" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple required>
            @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
            {{-- <option  value="{{ $color->color_code }}">{{' ' .$color->name }}</option>  --}}
            @if(@$product->is_static == 1 && @$product->colors != null)
            <option

                value="{{ $color->color_code }}"
                <?php if(in_array($color->id, json_decode($product->colors))) echo 'selected'?>
            >
            {{$color->name}}
            </option>
            @endif
            @endforeach
        </select>
        @else
        <select class="color-choose color_table" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple required disabled>
            @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
            <option  value="{{ $color->color_code }}">{{' ' .$color->name }}</option> 
           
            @endforeach
        </select>
        @endif

        {{-- <textarea class="form-control" rows="5" name="colors" type="textarea" id="colors" >{{ $product->colors?? ''}}</textarea> --}}
        {!! $errors->first('colors', '<p class="help-block">:message</p>') !!}
    </div>
    @if(@$product->colors == null )
    <div class="col-md-0">
        <label class="aiz-switch aiz-switch-success mb-0">
            <input value="1" type="checkbox" name="colors_active" >
            <span></span>
        </label>
    </div>
    @else
    <div class="col-md-1">
        <label class="aiz-switch aiz-switch-success mb-0">
            @if(@$product->is_static == 1 && @$product->colors != null)
            <input value="1" type="checkbox" name="colors_active" <?php if(count(json_decode($product->colors)) > 0) echo "checked";?>>
            @else
            <input value="1" type="checkbox" name="colors_active" checked>
            @endif
            <span></span>
        </label>
    </div>
    @endif
</div>
<br>

<div class="sku_combination" id="sku_combination"  style="margin-left: 262px !important;margin-right: 120px !important;">
    <table class="table table-bordered " >
		<thead>
			<tr >
				<th class="text-center">
					<label for="" class="control-label">Color</label>
				</th>
				{{-- <td class="text-center">
					<label for="" class="control-label">Variant Price</label>
				</td> --}}

				<th class="text-center">
					<label for="" class="control-label">Quantity</label>
				</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
            @if(sizeof($variations))
                @foreach ($variations as  $variation)
                <tr class="variant">
                    <td>
                        <label for="" class="control-label">{{ $variation->color }}</label>
                    </td>
                    {{-- <td>
                        <input type="number" name="price_{{ $str }}" value="{{ $unit_price }}" min="0" step="0.01" class="form-control" required="">
                    </td> --}}
                    <td>
                        <input type="number" lang="en" name="qty[]" value="{{ $variation->stock }}"  min="0" step="1" class="form-control" required>
                    </td>

                    <td>
                        <button type="button" id="delete_variant" class="btn btn-icon btn-sm btn-danger delete_variant" ><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
           @endif
	</tbody>
</table>
</div>

<div class="form-group {{ $errors->has('sale_price') ? 'has-error' : ''}}">
    <label for="sale_price" class="col-md-4 control-label">{{ 'Sale Price' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input class="form-control" name="sale_price" type="number" id="sale_price" placeholder="0" value="{{ @$product->sale_price - @$product->commission}}" required maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('dollor') ? 'has-error' : ''}}">
    <label for="dollor" class="col-md-4 control-label">{{ 'Dollor' }}</label>
    <div class="col-md-6">
        <input class="form-control dollor" name="dollor" type="number" id="dollor" placeholder="0" value="{{ $product->dollor?? ''}}"   readonly>
        {!! $errors->first('dollor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('riyal') ? 'has-error' : ''}}">
    <label for="riyal" class="col-md-4 control-label">{{ 'Riyal' }}</label>
    <div class="col-md-6">
        <input class="form-control riyal" name="riyal" type="number" id="riyal" placeholder="0" value="{{ $product->riyal?? ''}}"   readonly>
        {!! $errors->first('riyal', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dinar') ? 'has-error' : ''}}">
    <label for="dinar" class="col-md-4 control-label">{{ 'Dinar' }}</label>
    <div class="col-md-6">
        <input class="form-control dinar" name="dinar" type="number" id="dinar" placeholder="0"  value="{{ $product->dinar?? ''}}"  readonly>
        {!! $errors->first('dinar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('euro') ? 'has-error' : ''}}">
    <label for="euro" class="col-md-4 control-label">{{ 'Euro' }}</label>
    <div class="col-md-6">
        <input class="form-control euro" name="euro" type="number" id="euro" placeholder="0" value="{{ $product->euro?? ''}}"   readonly>
        {!! $errors->first('euro', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('perchase_price') ? 'has-error' : ''}}">
    <label for="perchase_price" class="col-md-4 control-label">{{ 'Perchase Price' }}<span class="required"> *</span></label>
    <div class="col-md-6">
        <input class="form-control" name="perchase_price" type="number" id="perchase_price" placeholder="0" value="{{ $product->purchase_price?? ''}}" required maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('perchase_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('discount_type') ? 'has-error' : ''}}">
    <label for="discount_type" class="col-md-4 control-label">{{ 'Discount Type' }}</label>
    <div class="col-md-6">
        <select class="form-control select2" name="discount_type" id="discount_type">
            <option>Select Discount Type</option>
            @if(@$product->discount_type == 'amount')
                <option value="flat" selected>Flat</option>
                <option value="percent">Percent</option>
            @else 
                <option value="amount" >Flat</option>
                <option value="percent" selected>Percent</option>
            @endif
          
        </select>
        {!! $errors->first('discount_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="col-md-4 control-label">{{ 'Discount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="discount" type="number" id="discount" placeholder="0" value="{{ $product->discount?? ''}}" maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}


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
        <input class="form-control" name="shipping_cost" type="number" id="shipping_cost" placeholder="0" value="{{ $product->shipping_cost?? ''}}" maxlength="10" oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>
        {!! $errors->first('shipping_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{$errors->has('commission') ? 'has-error' : ''}}" >
    <label for="commission" class="col-md-4 control-label">{{ 'Commission' }}</label>
    <div class="col-md-6">
        <input class="form-control"  name="commission" type="number" value="{{ $product->commission?? ''}}" id="commission" readonly >
        {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submitBtn" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>

@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@3.1.0/dist/tagify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.1.1/tagify.min.js"></script>
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('vendor/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('js/script/forms/form-select2.js') }}"></script>
<script src="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>


<script>
    var max = '1000000';
    var $wrap = $('#sku');
    $('#getit').click(function() {
        var num = +$wrap.val();
        $wrap.val('SAT'+Math.ceil(Math.random() * max));
    });
   $('#shipping_cost').keyup(function(){
        var sale_price = parseInt($('#sale_price').val());
        var perchase_price = parseInt($('#perchase_price').val());
    //    var shipping_cost = $('#shipping_cost').val();
      
        var shipping_cost = parseInt($(this).val());
        // $('#shipping_cost').val(shipping_cost);
        if(sale_price != 0 && perchase_price != 0 && shipping_cost != 0){

            var sale_minus_perchase = ((sale_price - perchase_price));
            console.log('s_m_p',sale_minus_perchase);
            var commission = (sale_minus_perchase + shipping_cost);
            console.log('c',commission);
            $('#commission').val(commission);

        }else if(sale_price == 0 && perchase_price != 0){
            $('#commission').val('');
        }
        else if(sale_price != 0 && perchase_price == 0){
            $('#commission').val('');
        }
        else{
            $('#commission').val('');

        }

   });
   $('#sale_price').keyup(function(){
        var shipping_cost = parseInt($('#shipping_cost').val());
        var perchase_price = parseInt($('#perchase_price').val());
      
        var sale_price = parseInt($(this).val());
        // $('#shipping_cost').val(shipping_cost);
        if(sale_price != 0 && perchase_price != 0 && shipping_cost != 0){

            var sale_minus_perchase = ((sale_price - perchase_price));
            console.log('s_m_p',sale_minus_perchase);
            var commission = (sale_minus_perchase + shipping_cost);
            console.log('c',commission);
            $('#commission').val(commission);

        }else if(sale_price == 0 && perchase_price != 0){
            $('#commission').val('');
        }
        else if(sale_price != 0 && perchase_price == 0){
            $('#commission').val('');
        }
        else{
            $('#commission').val('');

        }

   });
   $('#perchase_price').keyup(function(){
        var shipping_cost = parseInt($('#shipping_cost').val());
        var sale_price = parseInt($('#sale_price').val());
      
        var perchase_price = parseInt($(this).val());
        // $('#shipping_cost').val(shipping_cost);
        if(sale_price != 0 && perchase_price != 0 && shipping_cost != 0){

            var sale_minus_perchase = ((sale_price - perchase_price));
            console.log('s_m_p',sale_minus_perchase);
            var commission = (sale_minus_perchase + shipping_cost);
            console.log('c',commission);
            $('#commission').val(commission);

        }else if(sale_price == 0 && perchase_price != 0){
            $('#commission').val('');
        }
        else if(sale_price != 0 && perchase_price == 0){
            $('#commission').val('');
        }
        else{
            $('#commission').val('');

        }

   });
    function readURL(input,id,i) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#'+id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[i]); // convert to base64 string
         }
      }
    var _URL = window.URL || window.webkitURL;
    $("#img_file").change(function(e) {
      
        var file, img;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function() {
              
                if(this.width >= 1200 && this.height >= 1200){
                   
                    var $el = $('#img_file');
                  
                    $el.wrap('<form>').closest('form').get(0).reset();
                    $el.unwrap();
                    $('#imgLabel').text('');
                    imgLabel
                    // alert(this.width + " " + this.height);
                    // alert('image hight and with should be 1200 ')
                }
            };
            img.onerror = function() {
                // alert( "not a valid file: " + file.type);
                $.toast({
                    heading: 'Error!',
                    position: 'top-center',
                    text: 'This is not an allowed file type',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });

                $("#img_file").val('') ;
            };
            img.src = _URL.createObjectURL(file);


        }
      readURL(this,'img_url',0);
    });

    var _URL = window.URL || window.webkitURL;
    $("#thumbnail_img").change(function(e) {
        var file, img;
        for(let i = 0; i<this.files.length;i++){
            console.log(i);
            if ((file = this.files[i])) {
                var ext = this.value.match(/\.(.+)$/)[1];
                switch (ext) {
                case 'jpg':
                case 'png':
                    $('#uploadButton').attr('disabled', false);
                    img = new Image();
                    img.src = _URL.createObjectURL(file);
                    break;
                default:
                    $.toast({
                        heading: 'Error!',
                        position: 'top-center',
                        text: 'This is not an allowed file type',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });

                    this.value = '';
                    $("#thumbnail_img").val('');
            }
                

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
        update_sku();
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
                    var option = '<option> Select Category</option>';
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
                    var option = '<option> Select SubCategory</option>';
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
                    var option = '<option value="null"> Select Child SubCategory</option>';
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
                

                // $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+value+'"><input type="text" class="form-control" name="choice[]" value="'+text+'" placeholder="Choice Title" readonly></div><div class="col-md-8"><input type="text" class="form-control attribute-values-'+count+'" name="choice_options_'+value+'[]" onchange="update_sku()" placeholder="Enter choice values" ></div></div>');
                // add_more_customer_choice_option($(this).val(), $(this).text());
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
                  $('#quantity').show();
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

        var size = document.querySelector('#size');
      
        
            $('#size').removeClass('form-control');
            var size = document.querySelector('#size');
            tagify = new Tagify(size);
            tagifyFun(tagify)
       
        var fabric = document.querySelector('#fabric');
      
            $('#fabric').removeClass('form-control');
            var fabric = document.querySelector('#fabric');
            tagify = new Tagify(fabric);
            tagifyFun(tagify)
      
        var tags = document.querySelector('#tags');
      
            $('#tags').removeClass('form-control');
            var tags = document.querySelector('#tags');
            tagify = new Tagify(tags);
            tagifyFun(tagify)
       

        function tagifyFun(tagify){
            const maxChars = 10; 
            tagify.on('input', function(e){
                console.log(e);
                if( e.detail.value.length > maxChars )
                    trimValue(e);
            })
            tagify.on('add', function(e){
                // remove last added tag if the total length exceeds
                if( tagify.DOM.input.textContent > maxChars )
                    tagify.removeTag(); // removes the last added tag
            })
            function trimValue(e){
                // reset the value completely before making changes
                tagify.value.length = 0; 
                // trim the value
                let newValue = tagify.DOM.originalInput.value.slice(0, maxChars - e.detail.length);
                // parse the new mixed value after trimming any excess characters
                tagify.parseMixTags(newValue)
            }
        }

        $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var product_type_id         = $('#product_type_id').val();
            var category_id             = $('#category_id').val();
            var subcategory_id          = $('#subcategory_id').val();
            var child_subcategory_id    = $('#child_subcategory_id').val();
            var name                    = $('#name').val();
            var sku                     = $('#sku').val();
            var brand_id                = $('#brand_id').val();
            var description             = $('#description').val();
            var tags                    = $('#tags').val();
            var img_file                = $('#img_file').val();
            var thumbnail_img           = $('#thumbnail_img').val();
            var size                    = $('#size').val();
            var fabric                  = $('#fabric').val();
            var color                   = $('#colors').val();
            var perchase_price          = $('#perchase_price').val();
            var sale_price              = $('#sale_price').val();
            
            
            if(product_type_id == '' && category_id == '' && subcategory_id == '' && child_subcategory_id == ''&& name == '' && brand_id == '' && sku == '' && description == '' && tags == '' && img_file == ''  && thumbnail_img == ''  && size == ''  && fabric == ''  && color == ''  && perchase_price == '' && sale_price == '' ){
                $('#submitBtn').prop('disabled',false);
            }else if(product_type_id != '' && category_id != '' && subcategory_id != '' && child_subcategory_id != ''&& name != '' && brand_id != '' && sku != '' && description != '' && tags != '' && img_file != '' && thumbnail_img != '' && size != '' && fabric != '' && color != '' && perchase_price != ''  && sale_price != ''){
                $('#submitBtn').prop('disabled',true);
                $('#choice_form').submit();
            }
            
        })
      

        // $('#sku').keyup(function(){
        //     var sku = $(this).val();
        //     console.log(sku);
        //     if(sku == null || sku == ''){
        //         console.log('sku filed is empty');
               
        //     }else{
        //         $.ajax({
        //             type:"POST",
        //             url: "{{url('product/product-sku-update-check')}}/" +sku??'',
        //             data:$('#choice_form').serialize(),
        //             cache: false,
        //             beforeSend: function(){

        //             },
        //             success: function(response){
        //                 console.log(response);
        //                 // $('#sku').html(data);
        //                 if (response == 1) {
        //                     $('#sku-error').html("");
        //                     $('#submitBtn').prop('disabled',false);
        //                 }else if(response == 'found') {
        //                     $('#sku-error').html("SKU NOT AVALIABLE!");
        //                     $('#submitBtn').prop('disabled',true);

        //                 }else if(response == 'not found') {
        //                     $('#sku-error').html("");
        //                     $('#submitBtn').prop('disabled',false);

        //                 }
        //             }
        //         });
        //     }
            
        // });
    });
  
</script>

@endpush

