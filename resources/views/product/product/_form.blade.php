@push('css')
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
        <input type="radio" name="product_type_id" id="product_type_id" value="1"> GENERAL 
        <input type="radio" name="product_type_id" id="product_type_id" value="2" style="margin-left: 51px;"> GROCERY
        {!! $errors->first('product_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="category_id" required disabled='true'> 

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
        <input class="form-control" name="name" type="text" id="name" value="{{ $product->name?? ''}}" />
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="col-md-4 control-label">{{ 'Brand' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="brand_id" id="brand_id" required> 
            <option value="" >Select Brand</option>
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" >{{ $brand->name }}</option>
            @endforeach
       
        </select>
        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    <label for="tags" class="col-md-4 control-label">{{ 'Tags' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="tags[]" type="textarea" id="tags" value="{{ $product->tags?? ''}}" />
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="text" id="description" required>{{ $product->description?? ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<h4 style="font-weight: bold">Add Images</h4>
<div class="form-group {{ $errors->has('front_image') ? 'has-error' : ''}}">
    <label for="front_image" class="col-md-4 control-label">{{ 'Front Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="front_image" type="file" id="img_file" onChange="img_pathUrl(this);" value="{{ $product->front_image?? ''}}" required>
        {!! $errors->first('front_image', '<p class="help-block">:message</p>') !!}
    </div>
    <img id="img_url" src="" alt="your image" />
</div>
<div class="form-group {{ $errors->has('thumbnail_image') ? 'has-error' : ''}}">
    <label for="thumbnail_image" class="col-md-4 control-label">{{ 'Thumb-nail Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" multiple name="thumbnail_image[]" type="file" id="thumbnail_img" value="{{ $product->front_image?? ''}}" required>
        {!! $errors->first('thumbnail_image', '<p class="help-block">:message</p>') !!}
    </div>
    {{-- <img id="thumbnail_img_url" src="" alt="your image" /> --}}
    
    <div class="row col-md-12">


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

<div class="form-group {{ $errors->has('colors') ? 'has-error' : ''}}">
    <label for="colors" class="col-md-4 control-label">{{ 'Colors' }}</label>
    <div class="col-md-6">
        {{-- <input type="text" name="colors" id="colors" class="form-control"> --}}
        <select class="color-choose color_table" data-live-search="true" data-selected-text-format="count" name="colors[]" id="colors" multiple disabled>
            @foreach (\App\ProductColor::orderBy('name', 'asc')->where('active',1)->get() as $key => $color)
                <option  value="{{ $color->color_code }} ">  {{ ' '.$color->name }}</option>
            @endforeach
        </select>

        {{-- <textarea class="form-control" rows="5" name="colors" type="textarea" id="colors" >{{ $product->colors?? ''}}</textarea> --}}
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
<div>
    <table class="table" id="color_append_table" style="display: none">
        <thead>
            <tr>
              <th>Variation</th>
              <th>Variation Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody">
        </tbody>

    </table>
    <input type="hidden" id="count">

</div>
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    <label for="options" class="col-md-4 control-label">{{ 'Options' }}</label>
    <div class="col-md-6">
        <select class="form-control attribute-choose" data-selected-text-format="count" data-live-search="true" multiple data-placeholder="Choose Attributes" name="choice_attributes[]" id="choice_attributes" multiple >
            @foreach (\App\Attribute::all() as $key => $attribute)
            <option value="{{ $attribute->name }}">{{ $attribute->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br>
<div>
    <p>Choose the attributes of this product and then input values of each attribute</p>
    <br>
</div>

<div class="customer_choice_options attribute_table" id="customer_choice_options">

</div>


<div class="form-group {{ $errors->has('sale_price') ? 'has-error' : ''}}">
    <label for="sale_price" class="col-md-4 control-label">{{ 'Sale Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sale_price" type="number" id="sale_price" placeholder="0" value="{{ $product->sale_price?? ''}}" required>
        {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('perchase_price') ? 'has-error' : ''}}">
    <label for="perchase_price" class="col-md-4 control-label">{{ 'Perchase Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="perchase_price" type="number" id="perchase_price" placeholder="0" value="{{ $product->perchase_price?? ''}}" required>
        {!! $errors->first('perchase_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="col-md-4 control-label">{{ 'Discount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="discount" type="text" id="discount" placeholder="0" value="{{ $product->discount?? ''}}" >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount_type') ? 'has-error' : ''}}">
    <label for="discount_type" class="col-md-4 control-label">{{ 'Discount Type' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="discount_type" type="text" id="discount_type" value="{{ $product->discount_type?? ''}}" > --}}
        <select class="form-control select2" name="discount_type" id="discount_type">
            <option value="amount">Flat</option>
            <option value="percent">Percent</option>
        </select>
        {!! $errors->first('discount_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="card-header">
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
</div>
<div class="form-group {{ $errors->has('shipping_cost') ? 'has-error' : ''}}" id="flat_shipping_cost">
    <label for="shipping_cost" class="col-md-4 control-label">{{ 'Shipping Cost' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shipping_cost" type="text" id="shipping_cost" placeholder="0" value="{{ $product->shipping_cost?? ''}}" >
        {!! $errors->first('shipping_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{$errors->has('commission') ? 'has-error' : ''}}" >
    <label for="commission" class="col-md-4 control-label">{{ 'Commission' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="commission" type="text" id="commission" placeholder="0"  >
        {!! $errors->first('commission', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>

@push('js')



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
        })
        $('#shipping_type_flat_rate').click(function(){
            $('#flat_shipping_cost').show();
        })


        
        $(document).ready(function () {

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
                        var option = '<option> Select Child SubCategory</option>';
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

            let  count = 0;
            $(document).on('change', '.color_table', function () {
                $('#color_append_table').show();
    
                    var str = "";
                    var bodyData = '';
                    if(str < 1){
                        var length = $('#count').val(0);
                        $('#color_append_table').hide();
                    }

                    $( ".color_table option:selected" ).each(function() {

                        str = $( this ).text();
                        index = $( this ).index();
                        console.log(str);
                        bodyData+="<tr class = 'variant'>"
                        bodyData+="<td>"+str+"</td><td><input type='number' name='variation_price[]' placeholder='price' required style='width:200px'/></td><td><input type='number' name='variation_quantity[]' id='variation_quantity'placeholder='qunatity' required style='width:200px'></td><td><a class='delete_variant'><button type='button' class='btn btn-icon btn-sm btn-danger' ><i class='las la-trash'></i></button><a/></td>";
                        bodyData+="</tr>";
                        $( "#count" ).val(1);
                        $('#color_append_table').show();


                    });
                    $( "#tbody" ).html(bodyData);
               

   
            });

            $(document).on('click','.delete_variant', function(){
                // var variant_color =  $(this).closest('.variant').text();
                // alert(variant_color);
                var values = $('.color_table option:selected').text();

                $(this).closest('.variant').remove();
                
              

            });

            $(document).on('change', '.attribute-choose', function () {
               
                    $('#customer_choice_options').html(null);
                    var count = 1;
                    $.each($("#choice_attributes option:selected"), function(){
                        var value = $(this).val();
                        var text = $(this).text();


                        $('#customer_choice_options').append('<div class="form-group row"><div class="col-md-3"><input type="hidden" name="choice_no[]" value="'+value+'"><input type="text" class="form-control" name="choice[]" value="'+text+'" placeholder="Choice Title" readonly></div><div class="col-md-8"><input type="text" class="form-control attribute-values-'+count+'" name="choice_options_'+value+'[]" placeholder="Enter choice values" ></div></div>');
                        count++;
                        
                    });
                   
                    var input = document.querySelector('.attribute-values-1');
                    var tagify = new Tagify(input);
                    tagify.addTags();

                    setTimeout(function() {
                        var input = document.querySelector('.attribute-values-2');
                        var tagify = new Tagify(input);
                        tagify.addTags();
                    }, 1000);
                   
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
                $(".attribute-values").select2({
                    width: "100%",
                    
                });
                

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

            var input = document.querySelector('#tags');
            var tagify = new Tagify(input);
            tagify.addTags();

          
 
        });
  
</script>

@endpush

