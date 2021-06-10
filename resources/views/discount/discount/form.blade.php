@push('css')
<style>
    span.select2-selection.select2-selection--single {
    height: 37px !important;
    width: 420px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b{
    margin-left: -15px !important;
}
</style>
@endpush

{{-- <div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    {!! Form::label('category_type', 'Category Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">

        <select name="category_type" required class="form-control" id="category_type">
            @if($action == "add")
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @else 
                @foreach($categories as $category)
                    @if($discount->category_type == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                    @else 
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach


            @endif
           
        </select>
        
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
@if($ACTION == 'CREATEE')
<div class="form-group {{ $errors->has('product_type_id') ? 'has-error' : ''}}">
    <label for="product_type_id" class="col-md-4 control-label">{{ 'Product Type' }}</label>
    <div class="col-md-6">
        
        <input type="radio" name="product_type_id"  id="product_type_id" value="1" required> GENERAL 
        <input type="radio" name="product_type_id" id="product_type_id" value="2" style="margin-left: 51px;" required> GROCERY
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
@elseif($ACTION == 'EDIT'))
<div class="form-group {{ $errors->has('product_type_id') ? 'has-error' : ''}}">
    <label for="product_type_id" class="col-md-4 control-label">{{ 'Product Type' }}</label>
    <div class="col-md-6">
        <input type="radio" name="product_type_id" id="product_type_id" value="1" {{(@$discount->product_type_id==1) ? "checked" :''}}> GENERAL 
        <input type="radio" name="product_type_id" id="product_type_id" value="2" style="margin-left: 51px;"  {{(@$discount->product_type_id==2) ? "checked" :''}}> GROCERY
        {!! $errors->first('product_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="category_id"  required > 
            @foreach($Categories as $Category)

            <option value="{{ @$Category->id }}" {{(  @$Category->id == @$discount->category_id) ? 'selected="true"':'' }}>(Category) <strong>{{ @$Category->name }}</strong></option>

            @endforeach
        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('subcategory_id') ? 'has-error' : ''}}">
    <label for="subcategory_id" class="col-md-4 control-label">{{ 'Subcategory' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="subcategory_id" id="subcategory_id" required > 
            @foreach(@$subCategories as $subCategory)
            <option value="{{ @$subCategory->id }}" {{(  @$subCategory->id == @$discount->subcategory_id) ? 'selected="true"':'' }}>(SubCategory) <strong>{{ @$subCategory->name }}</strong></option>

            @endforeach
            
        </select>
        {!! $errors->first('subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('child_subcategory_id') ? 'has-error' : ''}}">
    <label for="child_subcategory_id" class="col-md-4 control-label">{{ 'Child Subcategory' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="child_subcategory_id" id="child_subcategory_id" required > 
            @foreach(@$childSubCategories as $shildsubCategory)
            <option value="{{ @$shildsubCategory->id }}" {{(  @$shildsubCategory->id == @$discount->child_subcategory_id) ? 'selected="true"':'' }}>(Child SubCategory) <strong>{{ @$shildsubCategory->name }}</strong></option>

            @endforeach
            
        </select>
        {!! $errors->first('child_subcategory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('disount_type') ? 'has-error' : ''}}">
    {!! Form::label('disount_type', 'Disount Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="disount_type" id="disount_type" required class="form-control">

            @if($ACTION == 'CREATEE')
                <option value="">Select Discount Type</option>
                <option value="percent">Percent</option>
                <option value="amount">Amount</option>
            @elseif($ACTION == 'EDIT') 
                @if(@$discount->discount_type == 'percent')
                    <option value="percent" selected>Percent</option>
                    <option value="amount">Amount</option>

                @else 
                    <option value="percent" >Percent</option>
                    <option value="amount" selected>Amount</option>
                @endif

            @endif
           

        </select>
        {{-- {!! Form::text('disount_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('disount_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount_title') ? 'has-error' : ''}}">
    {!! Form::label('discount', 'Discount Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('discount_title', null, ('required' == '') ? ['id'=>'discount_title','maxlength'=>'45','class' => 'form-control', 'required' => 'required'] : ['maxlength'=>'40','class' => 'form-control']) !!}
        {!! $errors->first('discount_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    {!! Form::label('discount', 'Discount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input class="form-control" name="discount" type="number" id="discount" value="{{ $discount->discount??''}}" maxlength="5" required  oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>

        {{-- {!! Form::number('discount', null, ('required' == 'required') ? ['maxlength'=>'5','class' => 'form-control', 'required' => 'required'] : ['maxlength'=>'5','class' => 'form-control']) !!} --}}
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('start_date', null, ('required' == 'required') ? ['id'=>'start_date','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    {!! Form::label('end_date', 'End Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('end_date', null, ('required' == 'required') ? ['id'=>'end_date','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['id'=>'submitBtn','class' => 'btn btn-primary']) !!}
    </div>
</div>
@push('js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
    //change selectboxes to selectize mode to be searchable

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

      $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var product_type_id         = $('#product_type_id').val();
            var category_id             = $('#category_id').val();
            var subcategory_id          = $('#subcategory_id').val();
            var child_subcategory_id    = $('#child_subcategory_id').val();
            var disount_type            = $('#disount_type').val();
            var discount_title          = $('#discount_title').val();
            var discount                = $('#discount').val();
            var start_date              = $('#start_date').val();
            var end_date                = $('#end_date').val();
     
            if(product_type_id == '' && category_id == '' && subcategory_id == '' && child_subcategory_id == ''&& disount_type == '' && discount_title == '' && discount == '' && start_date == '' && end_date == ''){
                $('#submitBtn').prop('disabled',false);
            }else if(product_type_id != '' && category_id != '' && subcategory_id != '' && child_subcategory_id != ''&& disount_type != '' && discount_title != '' && discount != '' && start_date != '' && end_date != ''){
                $('#submitBtn').prop('disabled',true);
                $('#create').submit();
            }
            
        })
   
    });

</script>

@endpush