@push('css')
<style>
    span.select2-selection.select2-selection--single {
    height: 37px;
}
</style>
@endpush

<div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : ''}}">
    <label for="sub_category_id" class="col-md-4 control-label">{{ 'Sub Category Id' }}</label>
    <div class="col-md-6">
        <select  class="form-control" name="sub_category_id" id="sub_category_id" required > 
            <option value="">Select SuCategory</option>
            @foreach ($getSubCategories as $subcategory)
            @if($childsubcategory->sub_category_id == $subcategory->id)
                <option value="{{ $subcategory->id }}" selected>{{ $subcategory->name }}</option>
            @else 
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endif
                
            @endforeach
        </select>
        {!! $errors->first('sub_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $childsubcategory->name?? ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ $childsubcategory->url_name?? ''}}" required>
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
        $("#sub_category_id").select2();
        // $("#subcategory_id").select2();
   
    });

</script>

@endpush


