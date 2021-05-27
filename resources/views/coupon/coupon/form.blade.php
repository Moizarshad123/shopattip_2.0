<div class="form-group {{ $errors->has('coupon') ? 'has-error' : ''}}">
    {!! Form::label('coupon', 'Coupon', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('coupon', null, ('required' == 'required') ? ['readonly','id'=>'testid','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('coupon', '<p class="help-block">:message</p>') !!}
    </div>
    <input type="button" id="getit" class="button" value="Generate"  >

</div><div class="form-group {{ $errors->has('coupon_type') ? 'has-error' : ''}}">
    {!! Form::label('coupon_type', 'Coupon Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
     
        <select name="coupon_type" class="form-control" required>
           
           @if($action == 'add') 
                <option value="">Select Coupon Type</option>
                <option value="percent">Percent</option>
                <option value="amount">Amount</option>
              
            @else 
            
                @if($coupon->coupon_type == 'percent')
                    <option value="percent" selected>Percent</option>
                    <option value="amount">Amount</option>
                @else 
                    <option value="percent">Percent</option>
                    <option value="amount" selected>Amount</option>
                @endif
            @endif

          
        </select>
        {{-- {!! Form::text('coupon_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('coupon_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('coupon_amount') ? 'has-error' : ''}}">
    {!! Form::label('coupon_amount', 'Coupon Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('coupon_amount', null, ('required' == 'required') ? ['maxlength'=>'5','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'])  !!}
        {!! $errors->first('coupon_amount', '<p class="help-block">:message</p>') !!}
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

@section('externalJsLinks')
<script>
var max = '1000000';
var $wrap = $('#testid');
$('#getit').click(function() {
    var num = +$wrap.val();
    $wrap.val('SAT'+Math.ceil(Math.random() * max));
});

</script>

@endsection
