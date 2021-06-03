@push('css')
{{-- <link rel="stylesheet" href="{{ asset('vendor/css/forms/select/select2.min.css') }}"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    /* span.select2-selection.select2-selection--single{
        height: 39px !important;
        border: 0.5px solid #e5ebec !important;
        margin-right: 10px !important;

    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        left: 10% !important;
    } */

</style>
@endpush
<div class="form-group {{ $errors->has('brand_type_id') ? 'has-error' : ''}}">
    <label for="brand_type_id" class="col-md-4 control-label">{{ 'Brand Type' }}</label>
    <div class="col-md-6" >
        {{-- <select class="form-control brand_type_id" name="brand_type_id" id="brand_type_id">
            <option value=""> Select Category Type</option>
            @if(@$brand->brand_type_id == 1)
                <option  value="1" selected>General</option>
                <option  value="2">Grocery</option>
            @elseif(@@$brand->brand_type_id == 2)
                <option  value="2" selected>Grocery</option>
                <option  value="1">General</option>
            @else
                <option  value="1">General</option>
                <option  value="2">Grocery</option>
            @endif
           
        </select> --}}
        <b><input type="radio" name="brand_type_id"  id="brand_type_id" value="1" {{(@$brand->brand_type_id==1) ? "checked" :''}} required> GENERAL </b>
        <b><input type="radio" name="brand_type_id" id="brand_type_id" value="2" {{(@$brand->brand_type_id==2) ? "checked" :''}} style="margin-left: 51px;" required> GROCERY</b>
        {!! $errors->first('brand_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'maxlength' =>'70'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    {!! Form::label('logo', 'Logo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('logo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        <br>
        @if($ACTION == 'EDIT')
        @include('includes.image_html',['variable'=>$brand->logo])
        @endif

        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
            $(document).ready(function () {
            //change selectboxes to selectize mode to be searchable
                // $("#brand_type_id").select2();
                
            });
  
</script>

@endpush

