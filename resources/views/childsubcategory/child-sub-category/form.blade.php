@push('css')
<style>
    span.select2-selection.select2-selection--single {
    height: 37px;
}
</style>
@endpush

<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    <label for="category_type" class="col-md-4 control-label">{{ 'Category Type' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_type" id="category_type" required > 
            <option value="">Select Category Type</option>
            <option @if(isset($getCategoryType->category_type_id) && $getCategoryType->category_type_id == '1') selected @endif value="1">General</option>
            <option @if(isset($getCategoryType->category_type_id) && $getCategoryType->category_type_id == '2') selected @endif value="2">Grocery</option>
        </select>
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if($ACTION == 'CREATES')
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="select_category" required > 
            {{-- <option value="">Select Category</option>
            @foreach ($getCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach --}}
        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@elseif($ACTION == 'EDIT')
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="category_id" id="select_category" required > 
            <option value="">Select Category</option>
            @foreach ($getCategories as $category)
            <option value="{{ $category->id }}" {{(  $category->id == $childsubcategory['subCategory']->category_id) ? 'selected="true"':'' }}>(Category) <strong>{{ $category->name }}</strong></option>

            @endforeach
        </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
@if($ACTION == 'CREATES')
<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : ''}}">
    <label for="sub_category_id" class="col-md-4 control-label">{{ 'Sub Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="sub_category_id" id="sub_category_id" required > 
            {{-- <option value="">Select Sub Category</option>
            @foreach ($getSubCategories as $subcategory)
                @if(@$childsubcategory->sub_category_id == $subcategory->id)
                    <option value="{{ $subcategory->id }}" selected>{{ $subcategory->name }}</option>
                @else 
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endif
            @endforeach --}}
        </select>
        {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@elseif($ACTION == 'EDIT')
<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : ''}}">
    <label for="sub_category_id" class="col-md-4 control-label">{{ 'Sub Category' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="sub_category_id" id="sub_category_id" required > 
            <option value="">Select Sub Category</option>
            @foreach ($getSubCategories as $subcategory)
            <option value="{{ $subcategory->id }}" {{(  $subcategory->id == @$childsubcategory->sub_category_id) ? 'selected="true"':'' }}>(SubCategory) <strong>{{ $subcategory->name }}</strong></option>
            @endforeach
        </select>
        {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ @$childsubcategory->name?? ''}}" required maxlength="70">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ @$childsubcategory->url_name?? ''}}" required maxlength="70">
        {!! $errors->first('url_name', '<p class="help-block">:message</p>') !!}
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
        $("#sub_category_id,#category_type,#select_category").select2();
        // $("#select_category").select2();
   
    });

    $('#category_type').change(function(){

        var type = $(this).val();
        var option = '<option value="">Select Category</option>';
        $.ajax({
                type: 'GET',
                url: "{{url('getcategoryforchildsubcat')}}/" +type,
                dataType: 'json',
                success: function(response) {
                    $.each(response,function(index,row){
                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    })
                    $("#select_category").empty();
                    $("#select_category").append(option);
                }
            });
    });

    $('#select_category').change(function(){
        var cat = $(this).val();
        var option = '<option value="">Select Sub Category</option>';
        $.ajax({
                type: 'GET',
                url: "{{url('getsubcategoryforchildsubcat')}}/" +cat,
                dataType: 'json',
                success: function(response) {
                    $.each(response,function(index,row){
                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    })
                    $("#sub_category_id").empty();
                    $("#sub_category_id").append(option);
                }
            });



    });

</script>

@endpush


