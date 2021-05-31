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

<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
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
        
        {{-- {!! Form::text('category_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('disount_type') ? 'has-error' : ''}}">
    {!! Form::label('disount_type', 'Disount Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="disount_type" required class="form-control">

            @if($action == 'add')
                <option value="">Select Discount Type</option>
                <option value="percent">Percent</option>
                <option value="amount">Amount</option>
            @else 
                @if($discount->discount_type == 'percent')
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
</div><div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    {!! Form::label('discount', 'Discount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('discount', null, ('required' == 'required') ? ['maxlength'=>'5','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('start_date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    {!! Form::label('end_date', 'End Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('end_date', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@push('js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
    //change selectboxes to selectize mode to be searchable
        $("#category_type").select2();
   
    });

</script>

@endpush