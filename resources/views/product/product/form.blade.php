@push('css')
<style>
    span.select2-selection.select2-selection--single {
    height: 37px;
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
<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
    <label for="brand_id" class="col-md-4 control-label">{{ 'Brand' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="brand_id" id="brand_id" required> 

            
        </select>
        {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    <label for="tags" class="col-md-4 control-label">{{ 'Tags' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="tags" type="textarea" id="tags" >{{ $product->tags?? ''}}</textarea>
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" required>{{ $product->description?? ''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('front_image') ? 'has-error' : ''}}">
    <label for="front_image" class="col-md-4 control-label">{{ 'Front Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="front_image" type="text" id="front_image" value="{{ $product->front_image?? ''}}" required>
        {!! $errors->first('front_image', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('colors') ? 'has-error' : ''}}">
    <label for="colors" class="col-md-4 control-label">{{ 'Colors' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="colors" type="textarea" id="colors" >{{ $product->colors?? ''}}</textarea>
        {!! $errors->first('colors', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    <label for="options" class="col-md-4 control-label">{{ 'Options' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="options" type="textarea" id="options" >{{ $product->options?? ''}}</textarea>
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sale_price') ? 'has-error' : ''}}">
    <label for="sale_price" class="col-md-4 control-label">{{ 'Sale Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sale_price" type="number" id="sale_price" value="{{ $product->sale_price?? ''}}" required>
        {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('perchase_price') ? 'has-error' : ''}}">
    <label for="perchase_price" class="col-md-4 control-label">{{ 'Perchase Price' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="perchase_price" type="number" id="perchase_price" value="{{ $product->perchase_price?? ''}}" required>
        {!! $errors->first('perchase_price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="col-md-4 control-label">{{ 'Discount' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="discount" type="text" id="discount" value="{{ $product->discount?? ''}}" >
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('discount_type') ? 'has-error' : ''}}">
    <label for="discount_type" class="col-md-4 control-label">{{ 'Discount Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="discount_type" type="text" id="discount_type" value="{{ $product->discount_type?? ''}}" >
        {!! $errors->first('discount_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('shipping_cost') ? 'has-error' : ''}}">
    <label for="shipping_cost" class="col-md-4 control-label">{{ 'Shipping Cost' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="shipping_cost" type="text" id="shipping_cost" value="{{ $product->shipping_cost?? ''}}" >
        {!! $errors->first('shipping_cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>

@push('js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
            $(document).ready(function () {
            //change selectboxes to selectize mode to be searchable
                $("#category_id,#subcategory_id,#child_subcategory_id,#brand_id").select2();
                // $("#subcategory_id").select2();

                $(document).on('change','#product_type_id',function(){
                    var product_type_id = $(this).val();
                    var option = '';
                    if(product_type_id != null){
                        $.ajax({
                        type: 'GET',
                        url: "{{url('get_category_by_select_product_type')}}/" +product_type_id,
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
                        url: "{{url('get_subcategory_by_select_category_type')}}/" +category_type_id,
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
                        url: "{{url('get_childSubcategory_by_select_subcategory_type')}}/" +subcategory_type_id,
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

                

                
            });
  
</script>

@endpush

